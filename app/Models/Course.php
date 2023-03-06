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
        $loan = $this->duration;
        $instalment = $totalLoan / $loan;
        $priceLoan = $instalment + $totalLoan / 100;
        return $priceLoan;
    }
}
