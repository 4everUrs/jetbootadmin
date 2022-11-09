<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claimapprove extends Model
{
    use HasFactory;
    protected $fillable =[
        'item', 'purchasedate', 'purchaseby', 'amount', 'paidby','status'
    ];
}
