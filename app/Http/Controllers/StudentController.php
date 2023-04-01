<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Paytm;
use App\Models\StudentCourseDetails;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    function generate_payment()
    {
        $courses = StudentCourseDetails::where(
            [
            ['status', true], 
            ['user_id', Auth::id()],
            ['type',"0"],
            ]
            )->with('course')->with('payment')->get();

            // dd($courses);
        
        foreach ($courses as $course) {
            if($course->payment->count() <= 1){
                $totalLoan = $course->course->discount_fee;
                $interest = "0";
                $loan = $course->course->duration;
                $instalment = $totalLoan / $loan;
                $priceLoan = $instalment + $totalLoan * $interest / 100;
                $fixedDateEveryMonth = date('d',strtotime($course->created_at));

                $start = new DateTime(date('Y-m-') . $fixedDateEveryMonth);
                // dd($start);
                for ($i = 1; $i <= $loan; $i++) {
                    $dateLoan = $start->format('d-M-Y');
                    $dateformat = $start->format("d-m-Y h:i:s a");
                    if(Paytm::where(['student_id' => auth::id(),'payment_id' => $course->id])->where("TXNID","!=","")->first() && $i == 1){
                        $start->add(new DateInterval("P1M"));
                        continue;
                    }

                    Paytm::create([
                        'ORDERID' => "CWS"."".rand(1,999999),
                        'student_id' => auth::id(),
                        'payment_id' => $course->id,
                        'due_date' => "$dateformat",
                        'TXNAMOUNT' =>  $priceLoan,
                    ]);

                    $priceLoan = $instalment;
                    $start->add(new DateInterval("P1M"));

                }
            }
        }
    }
    public function profile()
    {
        $this->generate_payment();
        $data['courses'] = StudentCourseDetails::where([['status', true], ['user_id', Auth::id()]])->get();
        $data['pendingCourses'] = StudentCourseDetails::where([['status', false], ['user_id', Auth::id()]])->get();
        return view("students.profile", $data);
    }
    public function myPayments()
    {
        $data['payments'] = Payments::where('student_id', Auth::id())->get();
        return view("students.myPayments", $data);
    }
    public function myCourses()
    {
        $data['courses'] = StudentCourseDetails::where([['status', true], ['user_id', Auth::id()]])->get();
        return view("students.myCourses", $data);
    }
}
