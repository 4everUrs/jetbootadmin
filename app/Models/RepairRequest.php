<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'content', 'status',
    ];

    function getItem()
    {
        return $this->hasMany('App\Models\RepairRequest');
    }
}
