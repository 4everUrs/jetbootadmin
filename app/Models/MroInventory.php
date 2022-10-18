<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MroInventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock_id', 'item_name', 'description', 'quantity', 'unit_price', 'inventory_value',
    ];
}
