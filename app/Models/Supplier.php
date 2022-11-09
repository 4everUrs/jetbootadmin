<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'status', 'phone', 'email', 'user_id', 'start', 'end'];

    function getPurchaseOrder()
    {
        return $this->hasMany('App\Models\PurchaseOrder');
    }
}
