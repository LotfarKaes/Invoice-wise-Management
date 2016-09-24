<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TemplateFormRequest extends Request {

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
            [
              'name'=> 'required',
              'subject' => 'required',
              'body'    => 'required',
            ];
        return $rules;
	}

}
