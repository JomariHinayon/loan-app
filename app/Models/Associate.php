<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Associate extends Model
{
    use HasFactory;

    protected $table = 'associate';

    protected $fillable = [
        'associate_type', 
        'name', 
        'phone_number', 
        'application_id',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
