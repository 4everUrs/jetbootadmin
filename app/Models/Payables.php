<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payables extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice', 'idate', 'pname','invoiceamount', 'pamount', 'pduedate','premarks','paymade'
    ];
}
