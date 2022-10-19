<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'content', 'status', 'category',  'item_name', 'item_qty', 'requestor'
    ];
    public function WarehouseSent()
    {
        return $this->hasMany(WarehouseSent::class);
    }
}
