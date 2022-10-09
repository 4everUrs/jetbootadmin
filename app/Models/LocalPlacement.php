<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalPlacement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'placement', 'papers', 'location', 'ticket'
    ];
}
