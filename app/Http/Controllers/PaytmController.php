<?php

namespace App\Http\Controllers;

use App\Models\Paytm;
use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Application;
use App\Models\Payments;
use App\Models\User;

class PaytmController extends Controller
{
    public function pay(Request $request){

        $payment_id = $request->payment_id;
        
        $user = User::where([['contact',$request->contact],['status',true]])->first();
        $amount = $request->amount;

        if($payment_id == null){
            $paymentData = [
                'student_id' => $user->id,
                'amount' => $amount,
                'amount' => $amount,
            ];
           $payment =  Payments::create($paymentData);
           $payment_id = $payment->id;
        }

        $userData = [
            'payment_id' => $payment_id,
            'student_id' => $user->id,
            'TXNAMOUNT' => $amount,
            'ORDERID' =>    "CWS"."".rand(1,999999),
        ];

        Paytm::create($userData);

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $userData['ORDERID'],
            'user' => $user->id,
            'mobile_number' => $user->contact,
            'email' => $user->email,
            'amount' => $userData['TXNAMOUNT'],
            'callback_url' => route('paytm.callback')
        ]);
        return $payment->receive();
    }


    public function paytmcallback()
    {

        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();

        $amount = $response['TXNAMOUNT'];

        $order_id = $transaction->getOrderId(); // return a order id
        $transaction->getTransactionId(); // return a transaction id

        $pay = Paytm::where('ORDERID', $order_id)->first();
        $pay->TXNID = $response['TXNID'];
        $pay->PAYMENTMODE = $response['PAYMENTMODE'];
        $pay->TXNDATE = $response['TXNDATE'];
        $pay->RESPCODE = $response['RESPCODE'];
        $pay->RESPMSG = $response['RESPMSG'];
        $pay->GATEWAYNAME = $response['GATEWAYNAME'];
        $pay->BANKTXNID = $response['BANKTXNID'];
        $pay->STATUS = $response['STATUS'];
        $pay->save();

        if ($transaction->isSuccessful()) {

            $p = Payments::where('id',$pay->payment_id)->first();
            $p->status = "paid";
            $p->payment_mode = "online";
            $p->payment_date = $response['TXNDATE'];
            $p->save();

            toast('Your Payment of ₹'."$amount".' is successfully done','success');
            return redirect()->back();

        } else if ($transaction->isFailed()) {
            toast($response['RESPMSG'],'error');
            return redirect()->back();

        } else if ($transaction->isOpen()) {
            toast('Your payment is processing!','info');
            return redirect()->route('homepage');
        }

        $transaction->getResponseMessage(); //Get Response Message If Available

        // $transaction->getOrderId(); // Get order id
    }
}
