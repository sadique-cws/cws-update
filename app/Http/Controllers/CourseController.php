<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function courses(){
        $data['courses'] = Course::all();
        return view('admin.courses',$data);
    }

    public function addCourse(){
        return view('admin.add_course');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'duration'=>'required'
        ]);

        $image = time(). "." . $request->cover_image->extension();
        $request->cover_image->move(public_path("images/course"),$image);

        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->fee = $request->fee;
        $course->image = $image;
        // $course->save();

        if($course->save()){
            toast('Course successfully added!','success');
        }
        else{
            toast('something went wrong!','error');
        }

        return redirect()->back();
    }

    public function editCourse($id){
        $data['course'] = Course::find($id);
        return view('admin.edit_course',$data);
    }

    public function edit(Request $request){
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'duration'=>'required'
        ]);

        $course = Course::find($request->course_id);
        $course->title = $request->title;
        $course->description = $request->description;
        $course->duration = $request->duration;
        // $course->save();

        if($course->save()){
            toast('Course successfully added!','success');
        }
        else{
            toast('something went wrong!','error');
        }

        return redirect()->back();
    }

    public function delete($id){
        $query = Course::find($id);
        $query->delete();

        if($query){
            toast('Course has been deleted!','success');
        }
        else{
            toast('something went wrong!','error');
        }

        return redirect()->back();

    }
}
