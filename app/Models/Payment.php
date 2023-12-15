<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'phone_number',
        'month_paid',
        'phone_number',
        'loan_id',
        "amount_paid",
        "pay_date"
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
