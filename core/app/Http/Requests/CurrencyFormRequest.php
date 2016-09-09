<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CurrencyFormRequest extends Request {

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
        $rules =  [
            'name'      => 'required|unique:currencies,name',
            'symbol'    => 'required|unique:currencies,symbol',
        ];
        if($id = $this->currency){
            $rules['name']      .= ','.$id.',uuid';
            $rules['symbol']    .= ','.$id.',uuid';
        }
		return $rules;
	}

}
