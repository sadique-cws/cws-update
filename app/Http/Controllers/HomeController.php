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
        $data['courses'] = Course::where('status',true)->get();
        $data['placements'] = Placement::where('status',true)->orderby('id','desc')->get();
        return view("public/home",$data);
    }
    public function courses(){
        $data['courses'] = Course::where('status',true)->get();
        return view('public/courses',$data);
    }

    public function apply(){
        return view('public/addmission');
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
