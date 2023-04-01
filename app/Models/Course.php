<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function getPaidAmount()
    {
        $totalLoan = $this->discount_fee;
        $interest = "0";
        $loan = $this->duration;
        $instalment = $totalLoan / $loan;
        $priceLoan = $instalment + $totalLoan * $interest / 100;
        return round($priceLoan);
    }

    public function getFullPaidAmount(){
        $discount = 0.1;
        $fee_amount = $this->discount_fee;
        $discount_amount = $fee_amount * $discount;
        return ($fee_amount - $discount_amount);

    }
}
