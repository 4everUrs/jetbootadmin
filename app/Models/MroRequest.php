<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MroRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 'origin', 'content', 'location', 'status'
    ];
}
