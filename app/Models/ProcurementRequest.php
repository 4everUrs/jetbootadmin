<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'content', 'status', 'category',  'item_name', 'item_qty', 'requestor', 'type'
    ];
    public function WarehouseSent()
    {
        return $this->hasMany(WarehouseSent::class);
    }
}
