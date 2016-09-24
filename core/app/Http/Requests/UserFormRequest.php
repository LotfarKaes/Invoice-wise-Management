<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserFormRequest extends Request {

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
        $rules =
            [ 'username' => 'required|unique:users,username',
              'email'    => 'required|email|unique:users,email',
              'phone'    => 'required',
              'name'     => 'required',
              'password' => 'confirmed|min:6',
            ];

        if($id = $this->users)
        {
            $rules['username'] .= ','.$id.',uuid';
            $rules['email'] .= ','.$id.',uuid';
        }
        else{
            $rules['password'] .= '|required';
        }
        return $rules;
	}
}
