<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\StudentCourseDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseView extends Component
{

    public $buyCourseStatus, $payable_amount = null, $type = null;

    public  Course $course;

    public function SetPayable($amount=700){
        $this->payable_amount = $amount;
    }

    public function addCourse(){
        $user = Auth::user();

        if(!Auth::check()){
            return redirect(route('login'));
        }
        if($this->type==null){
            session()->flash("error","Please Select Payment Mode First");
                return redirect()->back();
        }
        if($this->course){
            $order = StudentCourseDetails::where([["status",true],["user_id",$user->id],["course_id", $this->course->id]]);
            if($order->exists()){
                session()->flash("error","Course already added in Account");
                return redirect()->back();
            }
            else{
                $o = new StudentCourseDetails();
                $o->user_id = $user->id;
                $o->status = false;
                $o->type = $this->type;
                $o->course_id = $this->course->id;
                $o->save();

                return redirect()->route('student.profile');
            }
        }
        else{
            session()->flash("error","Course not found");
            return redirect()->back();
        }
    }
    public function render(){
        return view('livewire.course-view');
    }
}
