<?php namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Invoicer\Repositories\Contracts\UserInterface as User;

class UsersController extends Controller {

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
        $users = $this->user->all();
		return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

    /**
     * Store a newly created resource in storage.
     * @param UserFormRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(UserFormRequest $request)
	{
        $data = array('username' => $request->username,
                      'name' => $request->name,
                      'email' => $request->email,
                      'phone' => $request->phone,
                      'password' => bcrypt($request->password)
        );
        if($this->user->create($data)){
            flash()->success('User details saved');
            return response()->json(array('success' => true, 'msg' => 'user created'), 201);
        }
        return response()->json(array('success' => false, 'msg' => 'create failed'), 400);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->getById($id);
        return view('users.edit', compact('user'));
	}

    /**
     * Update the specified resource in storage.
     * @param UserFormRequest $request
     * @param $uuid
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(UserFormRequest $request, $uuid)
	{
        $data = array('username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        );
        if($request->password != ''){
            $data['password'] = bcrypt($request->password);
        }
        if($this->user->updateById($uuid, $data)){
            flash()->success('User details updated ');
            return response()->json(array('success' => true, 'msg' => 'user updated'), 200);
        }
        return response()->json(array('success' => false, 'msg' => 'update failed'), 411);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = $this->user->getById($id);
        if($this->user->deleteById($id)){
            \File::delete(public_path().'/assets/img/uploads/'.$user->photo);
        }
        flash()->success('User Record Deleted  ');
        return redirect('users');
	}

}
