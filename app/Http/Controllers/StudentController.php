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
        $courses = StudentCourseDetails::where([['status', true], ['user_id', Auth::id()]])->with('course')->get();

        foreach ($courses as $course) {
            $totalLoan = $course->course->discount_fee;
            $interest = "0";
            $loan = $course->course->duration;
            $instalment = $totalLoan / $loan;
            $priceLoan = $instalment + $totalLoan * $interest / 100;

            // dd($course->course->getPaidAmount());
            $fixedDateEveryMonth = 28;
            $start = new DateTime(date('Y-m-') . $fixedDateEveryMonth);
            for ($i = 1; $i <= $loan; $i++) {
                $start->add(new DateInterval("P1M"));
                $dateLoan = $start->format('d-M-Y');
                echo "$dateLoan - " . number_format($priceLoan, 0) . "\n";
                $paymentData = [
                    'student_id' => auth()->id,
                    'amount' => $priceLoan,
                ];
               $payment =  Paytm::create($paymentData);
                $priceLoan = $instalment; 
                
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
}
