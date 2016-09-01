<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Invoicer\Repositories\Contracts\SettingInterface as Settings;
use App\Invoicer\Repositories\Contracts\TemplateInterface as Templates;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

    /**
     * @var
     */

    protected $settings;

    /**
     * @var
     */

    protected $templates;

    /**
     *  Create a new password controller instance.
     * @param Guard $auth
     * @param PasswordBroker $passwords
     * @param Settings $settings
     */


    public function __construct(Guard $auth, PasswordBroker $passwords, Settings $settings, Templates $template)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;
        $this->settings = $settings;
        $this->templates = $template;

		$this->middleware('guest');
	}

    public function postEmail(Request $request){
        $this->validate($request, ['email' => 'required']);
        $settings = $this->settings->first();

        $response = $this->passwords->sendResetLink($request->only('email'), function($message) use($settings)
        {
            $message->sender( $settings ? $settings->email : 'noreply@classicnvoicer.com', $settings ? $settings->name : 'Classic Invoicer');
            $message->subject('Password Reminder');
        });

        switch ($response)
        {
            case PasswordBroker::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));

            case PasswordBroker::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }


}
