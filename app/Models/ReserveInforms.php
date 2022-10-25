<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveInforms extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'origin', 'pnumber','vmodel','dname','status',
    ];
}
