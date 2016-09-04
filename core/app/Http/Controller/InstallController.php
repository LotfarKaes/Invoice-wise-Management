<?php namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use App\Http\Requests\InstallUserRequest;
use App\Invoicer\Repositories\Contracts\UserInterface as User;
use Illuminate\Support\Facades\Config;


class InstallController extends Controller {

    /**
     * @var
     */

    protected $user;

    /**
     * @param User $user
     */

    public function __construct(User $user){
        $this->user = $user;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('install.requirements');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getDatabase()
	{
		return view('install.database');
	}

    /**
     * Store a newly created resource in storage.
     * @param InstallRequest $request
     * @return string
     */
    public function postDatabase(InstallRequest $request)
	{
        // Connect to the database
        try
        {
            $pdo = new \PDO("mysql:host=".$request->get('hostname'),$request->get('username'),$request->get('password'));
            //Create Database if not already created
            $pdo->exec("CREATE DATABASE IF NOT EXISTS ".$request->get('database'));

            $options = [
                'host'=>$request->get('hostname'),
                'database'=>$request->get('database'),
                'username'=>$request->get('username'),
                'password'=>$request->get('password'),
                ];


            $default = Config::get("database.connections.mysql");

            // Loop through our default array and update options if we have non-defaults
            foreach($default as $item => $value)
            {
                $default[$item] = isset($options[$item]) ? $options[$item] : $default[$item];
            }
            // Set the temporary configuration
            Config::set("database.connections.mysql", $default);

            //Edit config database.php file and add new database details
            $template_path 	= base_path().'/.env.example';

            // Open the file
            $database_file = file_get_contents($template_path);

            $new  = str_replace("%DB_HOST%",$request->get('hostname'),$database_file);
            $new  = str_replace("%DB_DATABASE%",$request->get('database'),$new);
            $new  = str_replace("%DB_USERNAME%",$request->get('username'),$new);
            $new  = str_replace("%DB_PASSWORD%",$request->get('password'),$new);

            // Write the contents back to the file
            if(file_put_contents(base_path().'/.env', $new)){
                //Execute the database migrations using artisan
                ini_set('max_execution_time', 90);

                \Artisan::call('migrate:install');
                \Artisan::call('migrate', array('--force' => true));
                \Artisan::call('db:seed');
            }
            //Create a install config file
            $config = "<?php return array('install' => true,
                                          'version' => 2,
                                          'install date' => '".date('Y-m-d H:i:s')."',
                                        );";
            \File::put(base_path().'/config/invoicer.php',$config);
            //Redirect to the next step
            return redirect('install/user');
        }
        catch (\Exception $e){
           \Flash::error('An installation error occured <br/><b> Reason:</b> '.$e->getMessage());
            return view('install.database');
        }
	}

    /**
     * Display the specified resource.
     */
    public function getUser()
	{
		return view('install.user');
	}

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function postUser(InstallUserRequest $request)
	{
        $data = array(
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        );
        if($this->user->create($data)){
            return redirect('auth/login');
        }
        return view('install.user');
	}
}
