<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempItem extends Model
{
    use HasFactory;
    protected $fillable =[
        'purchase_order_id', 'po_id'
    ];
}
