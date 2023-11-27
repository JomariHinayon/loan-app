<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Apps\Models\Application;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'home_ownership', 
        'monthly_rent', 
        'province', 
        'current_address', 
        'city',
        'barangay',  
        'years_living', 
    ];

    use HasFactory;

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
