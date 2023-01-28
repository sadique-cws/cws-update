<?php

namespace App\Http\Controllers;

use App\Models\StudentCourseDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function profile(){
        $data['courses'] = StudentCourseDetails::where([['status',true],['user_id', Auth::id()]])->get();
        $data['pendingCourses'] = StudentCourseDetails::where([['status',false],['user_id', Auth::id()]])->get();
        return view("students.profile",$data);
    }
}
