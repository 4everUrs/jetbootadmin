<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'year', 'month', 'salary_term', 'start_date', 'end_date', 'name'
    ];

    public function Employer()
    {
        return $this->belongsTo(Employee::class);
    }
}
