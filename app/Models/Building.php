<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'location', 'date', 'contractor', 'cost', 'specs', 'asset_id', 'status'
    ];
}
