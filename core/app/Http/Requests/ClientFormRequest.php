<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientFormRequest extends Request {

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
            [   'client_no' => 'required|unique:clients,client_no',
                'name'    => 'required|unique:clients,name',
                'email'    => 'required|email|unique:clients,email',
            ];

        if($id = $this->clients)
        {
            $rules['client_no'] .= ','.$id.',uuid';
            $rules['name'] .= ','.$id.',uuid';
            $rules['email'] .= ','.$id.',uuid';
        }
        return $rules;
	}

}
