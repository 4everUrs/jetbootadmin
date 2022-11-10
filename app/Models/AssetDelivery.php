<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetDelivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'buyer_id', 'invoice_id', 'status', 'invoice_file'
    ];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function Buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
