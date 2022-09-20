<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recieved extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'message', 'status','type',
    ];
}
