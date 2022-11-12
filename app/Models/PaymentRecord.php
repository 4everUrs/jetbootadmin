<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;
    protected $fillable = ['payroll_id'];

    public function Payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}
