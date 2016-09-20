<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        return \Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'username' => 'required|unique:users,username,'.\Auth::user()->uuid.',uuid',
            'email'    => 'required|email|unique:users,email,'.\Auth::user()->uuid.',uuid',
            'phone'    => 'required',
            'name'     => 'required',
            'password' => 'min:6',
            'photo'    => 'image|image_size:<=300',
		];
	}

}
