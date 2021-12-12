<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    public function student(){
        return $this->hasOne(User::class,'id','student_id');
    }
    public function paytm(){
        return $this->hasOne(Paytm::class,'payment_id','id')->where('STATUS','TXN_SUCCESS');
    }
}
