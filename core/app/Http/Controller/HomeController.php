<?php namespace App\Http\Controllers;

use App\Invoicer\Repositories\Contracts\InvoiceInterface as Invoice;
use App\Invoicer\Repositories\Contracts\ProductInterface as Product;
use App\Invoicer\Repositories\Contracts\ClientInterface as Client;
use App\Invoicer\Repositories\Contracts\EstimateInterface as Estimate;
use App\Invoicer\Repositories\Contracts\PaymentInterface as Payment;
use App\Invoicer\Repositories\Contracts\ExpenseInterface as Expense;

class HomeController extends Controller {
    protected $invoice, $product, $client, $estimate, $payment, $expense;
    /**
     * Create a new controller instance.
     */
    public function __construct(Invoice $invoice, Product $product, Client $client, Estimate $estimate, Payment $payment, Expense $expense)
	{
        $this->invoice      = $invoice;
        $this->product      = $product;
        $this->client       = $client;
        $this->estimate     = $estimate;
        $this->payment      = $payment;
        $this->expense      = $expense;
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clients = $this->client->count();
        $invoices = $this->invoice->count();
        $estimates = $this->estimate->count();
        $products = $this->product->count();
        $recentInvoices = $this->invoice->with('client')->limit(10)->get();
        foreach($recentInvoices as $count => $invoice){
            $recentInvoices[$count]['totals'] = $this->invoice->invoiceTotals($invoice->uuid);
        }
        $recentEstimates = $this->estimate->with('client')->limit(10)->get();
        foreach($recentEstimates as $count => $estimate){
            $recentEstimates[$count]['totals'] = $this->estimate->estimateTotals($estimate->uuid);
        }

        $invoice_stats['unpaid']        = $this->invoice->where('status', getStatus('label', 'unpaid'))->count();
        $invoice_stats['paid']          = $this->invoice->where('status', getStatus('label', 'paid'))->count();
        $invoice_stats['partiallyPaid'] = $this->invoice->where('status', getStatus('label', 'partially paid'))->count();
        $invoice_stats['overdue']       = $this->invoice->where('status', getStatus('label', 'overdue'))->count();
        $total_payments                 = $this->payment->totalIncome();
        $total_outstanding              = $this->invoice->totalUnpaidAmount();

        $income                         = $this->payment->yearlyIncome();
        $expense                        = $this->expense->totalExpenses();

        $payments = array();
        foreach($income[0] as $month=>$payment) {
            array_push($payments, $payment);
        }
        $yearly_income = json_encode($payments);

        $expenses = array();
        foreach($expense[0] as $month=>$expense) {
            array_push($expenses, $expense);
        }
        $yearly_expense = json_encode($expenses);

		return view('home', compact('clients','invoices','products','estimates','recentInvoices','recentEstimates', 'invoice_stats','yearly_income','yearly_expense','total_payments','total_outstanding'));
	}

}
