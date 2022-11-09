<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'attendance', 'salary', 'contribution', 'placement', 'status',
        'name', 'company', 'position', 'department', 'gender', 'address', 'mobile', 'email',
    ];

    public function Employer()
    {
        return $this->belongsTo(Employee::class);
    }
}
