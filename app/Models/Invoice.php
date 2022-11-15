<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id', 'wh_invoice_id'
    ];
    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function WhInvoice()
    {
        return $this->belongsTo(WhInvoice::class);
    }
}
