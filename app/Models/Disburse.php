<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disburse extends Model
{
    use HasFactory;
    protected $fillable = [
        'originated', 'category', 'amount','account', 'description', 'status'
    ];
}
