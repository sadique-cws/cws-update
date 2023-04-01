<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class StudentCourseDetails extends Model
{
    use HasFactory;


  
    public function course(): HasOne
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function payment(): HasMany
    {
        return $this->hasMany(Paytm::class,'payment_id','id');
    }
}
