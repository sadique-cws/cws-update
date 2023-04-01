<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paytm extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function student(){
        return $this->hasOne(User::class,'id','student_id');
    }
    public function studentCourse(){
        return $this->hasOne(StudentCourseDetails::class,'id','payment_id');
    }
}
