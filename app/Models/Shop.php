<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'item_name', 'condition', 'description', 'amount', 'status', 'origin', 'thumbnail', 'quantity'
    ];
    function getImages()
    {
        return $this->hasMany('App\Models\Image');
    }
}
