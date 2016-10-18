<?php namespace App\Invoicer\Repositories\Eloquent;

use App\Invoicer\Repositories\Contracts\PaymentInterface;

class PaymentRepository extends BaseRepository implements PaymentInterface{


    /**
     * @return string
     */

    public function model() {
        return 'App\Models\Payment';
    }

    /**
     * @return mixed
     */

    public function totalIncome(){
        $payment = $this->model();
        $stats = $payment::get([
                \DB::raw('SUM(amount) as received_amount')
            ]);
        return $stats;
    }

    public function yearlyIncome(){
        $query = "SELECT SUM(CASE WHEN MONTHNAME(payment_date) = 'January' THEN amount ELSE 0 END) AS Jan,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'February' THEN amount ELSE 0 END) AS Feb,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'March' THEN amount ELSE 0 END) AS Mar,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'April' THEN amount ELSE 0 END) AS Apr,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'May' THEN amount ELSE 0 END) AS May,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'June' THEN amount ELSE 0 END) AS Jun,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'July' THEN amount ELSE 0 END) AS Jul,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'August' THEN amount ELSE 0 END) AS Aug,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'September' THEN amount ELSE 0 END) AS Sept,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'October' THEN amount ELSE 0 END) AS Oct,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'November' THEN amount ELSE 0 END) AS Nov,
                            SUM(CASE WHEN MONTHNAME(payment_date) = 'December' THEN amount ELSE 0 END) AS Dece
                            FROM payments WHERE YEAR(payment_date) = YEAR(CURRENT_DATE)";
        $earnings =  \DB::select($query);
        return $earnings;
    }

    public function payment_summary($client = 'all', $from_date = '', $to_date = ''){
        $query = "SELECT payments.*, invoices.client_id, payment_methods.name AS method_name, clients.name AS client_name, invoices.number FROM payments
                  LEFT JOIN payment_methods ON payment_methods.uuid = payments.method
                  JOIN invoices ON invoices.uuid = payments.invoice_id
                  JOIN clients ON clients.uuid = invoices.client_id ";
       $where = '';
        if($client != 'all' && $client != '') {
            $where .= " WHERE invoices.client_id = '$client'";
        }
        if($from_date != '' && $to_date != '') {
            if($where == ''){
                $where .= " WHERE payment_date >= '".date('Y-m-d', strtotime($from_date))."' AND payment_date <= '".date('Y-m-d', strtotime($to_date))."'";
            }
            else{
                $where .= " AND payment_date >= '".date('Y-m-d', strtotime($from_date))."' AND payment_date <= '".date('Y-m-d', strtotime($to_date))."'";
            }
        }
       // echo $client; exit;
        $query .= $where.' ORDER BY payments.payment_date DESC';
        $payments =  \DB::select($query);
        return $payments;
    }

}