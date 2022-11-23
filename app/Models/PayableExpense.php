<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayableExpense extends Model
{
    use HasFactory;
    protected $fillable =[
        'eprequestor', 'epdescription', 'epaymenttype', 'epaymentdate', 'epamount'
        
    ];
}
