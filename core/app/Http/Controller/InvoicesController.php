<?php namespace App\Http\Controllers;

use App\Http\Requests\InvoiceFromRequest;
use App\Invoicer\Repositories\Contracts\InvoiceInterface as Invoice;
use App\Invoicer\Repositories\Contracts\ProductInterface as Product;
use App\Invoicer\Repositories\Contracts\ClientInterface as Client;
use App\Invoicer\Repositories\Contracts\TaxSettingInterface as Tax;
use App\Invoicer\Repositories\Contracts\CurrencyInterface as Currency;
use App\Invoicer\Repositories\Contracts\InvoiceItemInterface as InvoiceItem;
use App\Invoicer\Repositories\Contracts\SettingInterface as Setting;
use App\Invoicer\Repositories\Contracts\NumberSettingInterface as Number;
use App\Invoicer\Repositories\Contracts\InvoiceSettingInterface as InvoiceSetting;
use App\Invoicer\Repositories\Contracts\TemplateInterface as Template;
use App\Invoicer\Repositories\Contracts\EmailSettingInterface as MailSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;
use Orangehill\Iseed\Facades\Iseed;


class InvoicesController extends Controller {

   protected $product,$client,$tax,$currency,$invoice,$items,$setting,$number,$invoiceSetting, $template, $mail_setting;


   public function __construct(Invoice $invoice, Product $product, Client $client,  Tax $tax, Currency $currency, InvoiceItem $items, Setting $setting, Number $number, InvoiceSetting $invoiceSetting, Template $template, MailSetting $mail_setting){
       $this->invoice   = $invoice;
       $this->product   = $product;
       $this->client    = $client;
       $this->tax       = $tax;
       $this->currency  = $currency;
       $this->items     = $items;
       $this->setting   = $setting;
       $this->number    = $number;
       $this->invoiceSetting = $invoiceSetting;
       $this->template  = $template;
       $this->mail_setting = $mail_setting;
   }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$invoices = $this->invoice->all();
        foreach($invoices as $count => $invoice){
            $invoices[$count]['totals'] = $this->invoice->invoiceTotals($invoice->uuid);
        }
		return view('invoices.index', compact('invoices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $settings     = $this->invoiceSetting->first();
        $start        = $settings ? $settings->start_number : 0;
        $invoice_num  = $this->number->prefix('invoice_number', $this->invoice->generateInvoiceNum($start));

        $clients    = $this->client->clientSelect();
        $taxes      = $this->tax->taxSelect();
        $currencies = $this->currency->currencySelect();
        $statuses   = statuses();

		return view('invoices.create', compact('invoice_num','products', 'clients','taxes','currencies', 'statuses', 'settings'));
	}

    /**
     * Store a newly created resource in storage.
     * @param InvoiceFromRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(InvoiceFromRequest $request)
	{
        $invoiceData = array(
            'client_id'     => $request->get('client'),
            'number'        => $request->get('number'),
            'invoice_date'  => date('Y-m-d', strtotime($request->get('invoice_date'))),
            'due_date'      => date('Y-m-d', strtotime($request->get('due_date'))),
            'notes'         => $request->get('notes'),
            'terms'         => $request->get('terms'),
            'currency'      => $request->get('currency'),
            'status'        => $request->get('status'),
            'discount'      => $request->get('discount') != '' ? $request->get('discount') : 0
        );

        $invoice = $this->invoice->create($invoiceData);
        if($invoice){
            $items = json_decode($request->get('items'));
            foreach($items as $item){
                $itemsData = array(
                    'invoice_id'        => $invoice->uuid,
                    'item_name'         => $item->item_name,
                    'item_description'  => $item->item_description,
                    'quantity'          => $item->quantity,
                    'price'             => $item->price,
                    'tax_id'            => $item->tax != '' ? $item->tax : null ,
                );
               $this->items->create($itemsData);
            }
            $settings     = $this->invoiceSetting->first();
            if($settings){
                $start = $settings->start_number+1;
                $this->invoiceSetting->updateById($settings->uuid, array('start_number'=>$start));
            }
            return Response::json(array('success' => true,'redirectTo'=>route('invoices.show', $invoice->uuid), 'msg' =>  trans('application.record_created')), 200);
        }
        return Response::json(array('success' => false, 'msg' => trans('application.record_creation_failed')), 400);
	}
    /**
     * Display the specified resource.
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
	public function show($uuid)
	{
        $invoice = $this->invoice->with('items')->getById($uuid);

        if($invoice){
            $settings = $this->setting->first();
            $invoiceSettings = $this->invoiceSetting->first();
            $invoice->totals = $this->invoice->invoiceTotals($uuid);
            return view('invoices.show', compact('invoice','settings', 'invoiceSettings'));
        }
        return redirect('invoices');
	}
    /**
     * Show the form for editing the specified resource.
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
	public function edit($uuid)
	{
        $invoice   = $this->invoice->with('items')->getById($uuid);
        if($invoice){
            $clients    = $this->client->clientSelect();
            $taxes      = $this->tax->taxSelect();
            $currencies = $this->currency->currencySelect();
            $statuses   = statuses();
            $invoice->totals = $this->invoice->invoiceTotals($uuid);
            return view('invoices.edit', compact('invoice', 'clients', 'taxes', 'currencies', 'statuses'));
        }
        return redirect('invoices');
	}
    /**
     * Update the specified resource in storage.
     * @param InvoiceFromRequest $request
     * @param $uuid
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(InvoiceFromRequest $request, $uuid)
	{
        $invoiceData = array(
            'client_id'     => $request->get('client'),
            'number'        => $request->get('number'),
            'invoice_date'  => date('Y-m-d', strtotime($request->get('invoice_date'))),
            'due_date'      => date('Y-m-d', strtotime($request->get('due_date'))),
            'notes'         => $request->get('notes'),
            'terms'         => $request->get('terms'),
            'currency'      => $request->get('currency'),
            'status'        => $request->get('status'),
            'discount'      => $request->get('discount') != '' ? $request->get('discount') : 0
        );

        $invoice = $this->invoice->updateById($uuid, $invoiceData);
        if($invoice){
            $items = json_decode($request->get('items'));
            foreach($items as $item){
                $itemsData = array(
                    'invoice_id'         => $invoice->uuid,
                    'item_name'          => $item->item_name,
                    'item_description'   => $item->item_description,
                    'quantity'           => $item->quantity,
                    'price'              => $item->price,
                    'tax_id'             => $item->tax != '' ? $item->tax : null ,
                );

                if(isset($item->itemId))
                    $this->items->updateById($item->itemId,$itemsData);
                else
                    $this->items->create($itemsData);
            }
            $this->invoice->changeStatus($uuid);
            return Response::json(array('success' => true,'redirectTo'=>route('invoices.show', $invoice->uuid), 'msg' => trans('application.record_updated')), 200);
        }
        return Response::json(array('success' => false, 'msg' => trans('application.record_update_failed')), 400);
	}

    /**
     * @return mixed
     */

    public function ajaxSearch(){
        return $this->invoice->ajaxSearch();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function deleteItem(){
        $id = \Input::get('id');
        if($this->items->deleteById($id)) {
            return Response::json(array('success' => true, 'msg' => trans('application.record_deleted')), 201);
        }
        return Response::json(array('success' => false, 'msg' => trans('application.record_deletion_failed')), 400);
    }

    /**
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function invoicePdf($uuid){
        $invoice = $this->invoice->with('items')->getById($uuid);
        if($invoice){
            $settings = $this->setting->first();
            $invoiceSettings = $this->invoiceSetting->first();
            $invoice->totals = $this->invoice->invoiceTotals($uuid);
            $pdf = \PDF::loadView('invoices.pdf', compact('settings', 'invoice', 'invoiceSettings'));
            return $pdf->download('invoice_'.$invoice->number.'_'.date('Y-m-d').'.pdf');
        }
        return redirect('invoices');
    }

    /**
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function send($uuid){
        $invoice = $this->invoice->with('items','client')->getById($uuid);
        $mail_setting = $this->mail_setting->first();
        if($invoice){
            $settings = $this->setting->first();
            $invoiceSettings = $this->invoiceSetting->first();
            $invoice->totals = $this->invoice->invoiceTotals($uuid);
            $pdf = \PDF::loadView('invoices.pdf', compact('settings', 'invoice', 'invoiceSettings'));

            $data['emailBody'] = 'An invoice has been generated';
            $data['emailTitle'] = 'An invoice has been generated';
            $template = $this->template->where('name','invoice')->first();
            if($template)
            {
                $data_object = new \stdClass();
                $data_object->invoice   = $invoice;
                $data_object->settings  = $settings;
                $data_object->client    = $invoice->client;

                $data['emailBody'] = parse_template($data_object, $template->body);
                $data['emailTitle'] = $template->subject;
            }
            $data['logo'] =  $settings ? $settings->logo : '';


            if($mail_setting){
                Config::set('mail.host', $mail_setting->smtp_host);
                Config::set('mail.username', $mail_setting->smtp_username);
                Config::set('mail.password', $mail_setting->smtp_password);
                Config::set('mail.port', $mail_setting->smtp_port);

                try
                {

                \Mail::send(['html'=>'emails.layout'], $data, function($message) use($pdf,$invoice,$settings)
                {
                    $message->sender($settings ? $settings->email : '', $settings ? $settings->name : '');
                    $message->to($invoice->client->email, $invoice->client->name);
                    $message->subject('Invoice Generated');
                    $message->attachData($pdf->output(), 'invoice_'.$invoice->number.'_'.date('Y-m-d').'.pdf');
                });
                Flash::success(trans('application.email_sent'));
                }
                catch (\Exception $e){
                    Flash::error($e->getMessage());
                    return Redirect::route('invoices.show', $uuid);
                }
            }
            else{
                Flash::error(trans('application.email_settings_error'));
            }

        }
        return redirect('invoices');
    }

    /**
     * Remove the specified resource from storage.
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function destroy($uuid)
	{
        if($this->invoice->deleteById($uuid)){
            Flash::success(trans('application.record_deleted'));
            return redirect('invoices');
        }
        Flash::error(trans('application.record_deletion_failed'));
        return redirect('invoices');
	}

}
