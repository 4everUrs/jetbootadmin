<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedVehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'buyer_id', 'vehicle_id', 'status'
    ];
    public function Buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
