<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'content', 'status', 'category', 'warehouse_sent_id', 'item_name', 'item_qty'
    ];
    public function WarehouseSent()
    {
        return $this->hasMany(WarehouseSent::class);
    }
}
