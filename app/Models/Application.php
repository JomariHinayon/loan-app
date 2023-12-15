<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Apps\Models\Address;
use Apps\Models\Employment;
use Apps\Models\Associate;
use Apps\Models\User;
use Apps\Models\Loan;

class Application extends Model
{
    protected $fillable = [
                            'first_name', 
                            'last_name', 
                            'middle_name', 
                            'gender',
                            'phone_number',  
                            'birthday', 
                            'loan_number',
                            'loan_amount', 
                            'months_to_pay', 
                            'interest_amount', 
                            'minimum_payment', 
                            'full_payment',
                            'loan_purpose',  
                            'loan_status',
                            'user_id',
                            'valid_id1',
                            'valid_id2'
                        ];
    use HasFactory;

    protected $attributes = [
        'loan_amount' => 0.00,
        'interest_amount' => 0.00,
        'minimum_payment' => 0.00,
        'full_payment' => 0.00,
        'loan_purpose' => '',
        'loan_status' => 'process',
        'months_to_pay' => 1,
        'valid_id1' => '',
        'valid_id2' => ''
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function employment()
    {
        return $this->hasOne(Employment::class);
    }

    public function associate()
    {
        return $this->hasOne(Associate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
    
}
