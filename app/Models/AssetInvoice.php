<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_id', 'user_id', 'order_id', 'creator'
    ];
}
