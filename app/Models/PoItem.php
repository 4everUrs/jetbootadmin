<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoItem extends Model
{
    use HasFactory;
    protected $fillable =[
        'po_id','qty','item','cost','totalcost','purchase_order_id'
    ];
}
