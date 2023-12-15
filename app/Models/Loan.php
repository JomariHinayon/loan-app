<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loan';

    protected $casts = [
        'payment_monthly' => 'json',
    ];

    protected $fillable = [
        'application_id', 
        'payment_monthly', 
        'payment_date', 
        'user_id',
        'start_payment_date',
        'end_payment_date',
        'fully_paid'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
