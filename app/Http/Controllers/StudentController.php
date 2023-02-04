<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\StudentCourseDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function profile(){
        generate_payment();
        $data['courses'] = StudentCourseDetails::where([['status',true],['user_id', Auth::id()]])->get();
        $data['pendingCourses'] = StudentCourseDetails::where([['status',false],['user_id', Auth::id()]])->get();
        return view("students.profile",$data);
    }
    public function myPayments(){
        $data['payments'] = Payments::where('student_id',Auth::id())->get();
        return view("students.myPayments",$data);
    }
}
