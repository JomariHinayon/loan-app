<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Employment extends Model
{
    use HasFactory;

    protected $table = 'employment';

    protected $fillable = [
                            'employment_type', 
                            'work_nature', 
                            'company_name',
                            'company_phone', 
                            'months_working', 
                            'salary_day', 
                            'monthly_income',
                            'application_id'
                        ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
