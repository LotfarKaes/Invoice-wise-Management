<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmailSettingsRequest extends Request {

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
		$rules = [
			'protocol'      => 'required',
			'smtp_host'     => 'required',
			'smtp_username' => 'required',
			'smtp_password' => 'required',
			'smtp_port'   	=> 'required',
		];
		return $rules;
	}

}
