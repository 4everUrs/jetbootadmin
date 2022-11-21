<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllocateBudgets extends Model
{
    use HasFactory;
    protected $fillable=[
        'department','startdate','enddate','recurrence','amounts'
    ];
}
