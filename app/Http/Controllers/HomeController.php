<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function home(){
        return view("public/home");
    }
    public function courses(){
        $data['courses'] = Course::where('status',true)->get();
        return view('public/course',$data);
    }
    public function ViewCourse(Course $course){
        $data['course'] = $course;
        return view('public/viewCourse',$data);
    }
    public function gallery(){
        // $data['gallery'] = $
        return view('public/gallery');
    }

    public function apply(){
        return view('public/apply');
    }

    public function placements(){
        $data['placements'] = Placement::where('status',true)->get();
        return view('public.placements',$data);
    }

    public function response(Request $request){
        $data = $request->session()->pull('data');
        return view('public/response',$data);
    }

}
