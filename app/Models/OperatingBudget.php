<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingBudget extends Model
{
    use HasFactory;
    protected $fillable = [
        'actual', 'used', 'remain'
    ];
}
