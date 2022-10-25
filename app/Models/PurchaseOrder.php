<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = ['supplier_id','po_id','supplier_name'];
    function getItem()
    {
        return $this->hasMany('App\Models\PoItem');
    }
  
}
