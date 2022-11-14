<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseBudget extends Model
{
    use HasFactory;
    protected $fillable = [
        'rorigin', 'rcategory', 'ramount', 'raccount', 'rstatus'
    ];
}
