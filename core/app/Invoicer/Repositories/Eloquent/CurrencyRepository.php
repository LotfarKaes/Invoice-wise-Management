<?php namespace App\Invoicer\Repositories\Eloquent;

use App\Invoicer\Repositories\Contracts\CurrencyInterface;

class CurrencyRepository extends BaseRepository implements CurrencyInterface{

    public function model() {
        return 'App\Models\Currency';
    }

    public function resetDefault(){
    	$tax  = new $this->model();
    	$tax->update(['selected' => 0]);
    }

    /**
     * @return array
     */
    public function currencySelect(){
        $currencies = $this->all();
        $currencyList = array();
        foreach($currencies as $currency)
        {
            $currencyList[$currency->symbol] = $currency->name;
        }
        return $currencyList;
    }
}