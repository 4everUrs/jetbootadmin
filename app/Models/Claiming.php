<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claiming extends Model
{
    use HasFactory;
    protected $fillable =[
        
        'name', 'position', 'basepay', 'benefits', 'insentives','insurance','overall','status'
    ];
}
