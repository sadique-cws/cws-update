<?php

namespace App\Http\Livewire;

use App\Models\Payments;
use App\Models\Paytm;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowDue extends Component
{
    public $payments, $payment_id, $student_id;

    protected $rules = [
        'payment_id' => 'required',
        'student_id' => 'required',
    ];
 
    public function mount(){
        $this->payments = Paytm::where('student_id',Auth::id())->orderby("student_id")->get();
    }

    // public function pay_dues(){
    //     $this->validate();

    //     $user = User::where('id',$this->student_id)->first();
    //     $phone = $user->contact;

    //     $payment = Payments::where([['id',$this->payment_id],['student_id',$this->student_id]])->update(['status'=>'paid','payment_date'=>Carbon::now(),'payment_mode'=>'cash']);

    //     $get_payment = Payments::where([['id',$this->payment_id],['student_id',$this->student_id]])->first();
    //     $date = new DateTime($get_payment->dues_month);
    //     $due_month = $date->format('M');

    //     if($payment){
    //         // dd($payment);
    //         $data = [
    //             'name' => $user->name,
    //             'due_month' => $due_month,
    //             'due_amount' => $get_payment->amount,
    //         ];

    //         // Mail::to($user->email)->send(new Paid($data));

    //         $msg = send($phone,'Hello '.$user->name.', Your Payment of ₹ '.$get_payment->amount.' is succefully done for '.$due_month.' month . Thank You --- CWS');
    //         toast("Dues set to Paid!",'success');
    //     }else{
    //         toast("Something went Wrong",'error');
    //     }
    //     // $this->payments = Payments::where('status','dues')->orderby("student_id")->get();

    // }

    public function render()
    {
        return view('livewire.show-due');
    }
}
