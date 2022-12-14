<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function OrderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
    public function ReservedVehicle()
    {
        return $this->hasOne(ReservedVehicle::class);
    }
}
