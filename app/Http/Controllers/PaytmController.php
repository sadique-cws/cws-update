<?php

namespace App\Http\Controllers;

use App\Models\Paytm;
use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\StudentCourseDetails;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaytmController extends Controller
{
    public function pay(Request $request){

        $payment_id = $request->payment_id;
        $user = Auth::user();

        if($request->has('orderid')){
            $orderid = $request->orderid;
            $order = Paytm::where('ORDERID',$orderid)->first();
            $payment = PaytmWallet::with('receive');

            $payment->prepare([
                'order' => $order->ORDERID,
                'user' => $user->id,
                'mobile_number' => $user->contact,
                'email' => $user->email,
                'amount' => $order->TXNAMOUNT,
                'callback_url' => route('paytm.callback')
            ]);
            
            return $payment->receive();
        }
        

        $amount = $request->amount;
        
        $userData = [
            'payment_id' => $payment_id,
            'student_id' => $user->id,
            'TXNAMOUNT' => $amount,
            'ORDERID' =>    "CWS"."".rand(1,999999),
            'due_date' => $request->due_date,
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
        $order_id = $transaction->getOrderId(); // return a order id
        $pay = Paytm::where('ORDERID', $order_id)->first();

        if ($transaction->isSuccessful()) {

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

            $courseDetails = StudentCourseDetails::findOrFail($pay->payment_id);
            $courseDetails->status = 1;
            $courseDetails->save();


            toast('Your Payment of ₹'."$amount".' is successfully done','success');
            return redirect()->back();

        } else if ($transaction->isFailed()) {
            toast($response['RESPMSG'],'error');
            
            if($pay->studentCourse->type == 1){
                $pay->delete();
            }
            
            return redirect()->back();

        } else if ($transaction->isOpen()) {
            toast('Your payment is processing!','info');
            return redirect()->route('homepage');
        }

        $transaction->getResponseMessage(); //Get Response Message If Available

        // $transaction->getOrderId(); // Get order id
    }
}
