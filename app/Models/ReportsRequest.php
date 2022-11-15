<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportsRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'content', 'status',
    ];
}
