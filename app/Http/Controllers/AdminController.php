<?php

namespace App\Http\Controllers;

use App\Mail\DuePayments;
use App\Mail\Paid;
use App\Models\Payments;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(){
        // generate_payment();
        $data['total_paid'] = Payments::where('status',"paid")->WhereMonth("created_at",Carbon::now()->month)->get();
        return view('admin.index',$data);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function new_addmission(){

        $data['students'] = User::where([['user_type','student'],['status',false]])->get();
        return view('admin.new_addmission',$data);
    }

    public function approve($id){
            $student = User::find($id);
            $student->status = 1;
            $student->save();
            return redirect()->route('students');
    }
    
     public function disabled($id){
            $student = User::find($id);
            $roll = $student->id;
           
            $student->status = 3;
            $student->save();
            $payments  = Payments::where([['student_id',$id],['status','dues']])->get();
            foreach($payments as $pay){
                echo $pay;
                $p = Payments::find($pay->id);
                $p->delete();
            }
            return redirect()->route('students');
    }
    public function students(){

        $data['students'] = User::where('user_type','student')->get();
        return view('admin.students',$data);
    }
    
   
    
       public function RemoveStudent($id){

        $student = User::where('user_type','student')->where('id',$id)->first();
        $student->delete();
        return redirect()->route("students");
    }
    
    public function addStudent(Request $request){
        $request->validate([
            'name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'contact'=>'required|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'gender'=>'required',
            'dob'=>'required',
            'password'=>'required',
        ]);


        $student = new User();
        $student->name = $request->name;
        $student->mother_name = $request->mother_name;
        $student->father_name = $request->father_name;
        $student->contact = $request->contact;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->address = $request->address;
        $student->education = $request->education;
        $student->password = Hash::make($request->password);

        if($request->has('flag') && $request->flag == 1){
            $student->status = true;
        }
        $student->save();

        if($request->has('flag')  && $request->flag == 0){
            toast('Your application is submitted, We will review as soon as possible. ','info');
        }
        else{
            toast('Student Has been added','success');
        }
        return redirect()->route('homepage');
    }

    public function updateDuesAmount(Request $request){

        $payment = Payments::where('id',$request->payment_id)->update([
            'amount'=>$request->amount
        ]);

        if($payment){
            toast("Dues amount updated!",'success');
        }else{
            toast("Something went Wrong",'error');
        }

        return redirect()->back();
    }

    public function dues_payments(){
        $data['dues'] = Payments::where('status','dues')->get();
        return view('admin.dues',$data);
    }

    public function paid_payments(){
        $data['paid'] = Payments::where('status','paid')->get();
        return view('admin.paid',$data);
    }

    public function pay_dues(Request $request){
        $user = User::where('id',$request->student_id)->first();
        $phone = $user->contact;

        $payment = Payments::where([['id',$request->payment_id],['student_id',$request->student_id]])->update(['status'=>'paid','payment_date'=>Carbon::now(),'payment_mode'=>'cash']);

        $get_payment = Payments::where([['id',$request->payment_id],['student_id',$request->student_id]])->first();
        $date = new DateTime($get_payment->dues_month);
        $due_month = $date->format('M');

        if($payment){
            $data = [
                'name' => $user->name,
                // 'email' => $email,
                'due_month' => $due_month,
                'due_amount' => $get_payment->amount,
            ];

            // Mail::to($user->email)->send(new Paid($data));

            $msg = send($phone,'Hello '.$user->name.', Your Payment of ??? '.$get_payment->amount.' is succefully done for '.$due_month.' month . Thank You --- CWS');
            toast("Dues set to Paid!",'success');
        }else{
            toast("Something went Wrong",'error');
        }
        return redirect()->back();
    }

    public function unpaid(Request $request){
        $payment =  Payments::where([['id'=>$request->payment_id],['student_id',$request->student_id]])->update(['status'=>'dues','payment_date'=>null]);

        if($payment){
            toast("Dues Set to Unpaid!",'success');
        }else{
            toast("Something went Wrong",'error');
        }
        return redirect()->back();
    }

    public function sendSms(Request $request){
        $student = User::where('id',$request->student_id)->first();

        $phone = $student->contact;
        $email = $student->email;
        $name = $student->name;
        $due_amount = $request->dues_amount;
        $due_month = $request->dues_month;

        $data = [
            'name' => $name,
            // 'email' => $email,
            'due_month' => $due_month,
            'due_amount' => $due_amount,
        ];

        // Mail::to($email)->send(new DuePayments($data));

        $msg = send($phone,'Hello '.$name.', Your Payment is dues for '.$due_month.' month , please pay ??? '.$due_amount.' as soon as possible. Thank You --- CWS');

        if($msg == 1){
            toast('Message sent!','success');
        }
        else{
            toast('Message sent!','success');
        }
        return redirect()->back();

    }

    public function messageAll(){
        // $student = User::where('id',$request->student_id)->first();

        $payments = Payments::where('status','dues')->get();
        $flaf = 0;
        foreach($payments as $dues){

            $date = new DateTime($dues->dues_month);

            $data = [
                'name' => $dues->student->name,
                // 'email' => $email,
                'due_month' => $date->format('M'),
                'due_amount' => $dues->dues_amount,
            ];

            // Mail::to($dues->student->email)->send(new DuePayments($data));

            $msg = send($dues->student->contact,'Hello '.$dues->student->name.', Your Payment is dues for '.$date->format('M').' month , please pay ??? '.$dues->dues_amount.' as soon as possible. Thank You --- CWS');

            $flag = 1;
        }

        if($flag == 1){
            toast("message sent!",'success');
            return redirect()->back();
        }
        else{
            toast("Something Went Wrong!",'error');
            return redirect()->back();
        }

    }
}
