<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uleave extends Model
{

    use HasFactory;
    protected $fillable = [
        'name', 'type', 'position', 'reason', 'datestart', 'dateend', 'status',
    ];
    
}
