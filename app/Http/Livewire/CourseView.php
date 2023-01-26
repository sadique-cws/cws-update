<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Http\Request;
use Livewire\Component;

class CourseView extends Component
{

    public $buyCourseStatus, $payable_amount = null, $type;

    public  Course $course;

    public function SetPayable($amount=700){
        $this->payable_amount = $amount;
    }
    public function render(){
        return view('livewire.course-view');
    }
}
