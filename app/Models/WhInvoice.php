<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'procurement_invoice_id', 'invoice_id', 'company_name', 'file_name', 'status'
    ];
}
