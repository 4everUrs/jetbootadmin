<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'supplier_id', 'description', 'cost_per_item', 'stock_value', 'item_no', 'stock_quantity',
        'reorder_level', 'status', 'remarks'
    ];
    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
