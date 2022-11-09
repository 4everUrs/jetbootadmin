<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalPlacement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'location', 'placement', 'papers', 'ticket'
    ];
}
