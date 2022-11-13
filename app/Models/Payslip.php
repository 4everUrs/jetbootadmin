<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    protected $fillable = [
        'payroll_id','local_employee_id','gross_salary','sss','philhealth','pagibig','net_salary','attendance'
    ];
    public function LocalEmployee()
    {
        return $this->belongsTo(LocalEmployee::class);
    }
    public function Payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}
