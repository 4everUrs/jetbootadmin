<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id', 'quantity', 'price', 'description', 'status'
    ];
    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function Stock()
    {
        return $this->hasOne(Stock::class);
    }
}
