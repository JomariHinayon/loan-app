<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Apps\Models\Address;
use Apps\Models\Employment;
use Apps\Models\Associate;

class Application extends Model
{
    protected $fillable = [
                            'first_name', 
                            'last_name', 
                            'middle_name', 
                            'gender',
                            'phone_number',  
                            'birthday', 
                        ];
    use HasFactory;

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
    
}
