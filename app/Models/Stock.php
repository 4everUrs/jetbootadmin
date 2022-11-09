<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Stock extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'name', 'supplier_id', 'description', 'cost_per_item', 'stock_value', 'item_no', 'stock_quantity',
        'reorder_level', 'status', 'remarks'
    ];
    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
