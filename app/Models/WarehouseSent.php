<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseSent extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', 'content', 'destination', 'status'
    ];
}
