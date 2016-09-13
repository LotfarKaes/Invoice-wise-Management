<?php namespace App\Http\Requests;

class InvoiceFromRequest extends Request {

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
            'client'        => 'required',
            'currency'      => 'required',
            'number'        => 'required|unique:invoices,number',
            'invoice_date'  => 'required',
            'due_date'      => 'required',
            'status'        => 'required'
        ];
        if($id =  $this->invoices){
            $rules['number']  .= ','.$id.',uuid';
        }
		return $rules;
	}

}
