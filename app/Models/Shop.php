<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name','condition','description','amount','status','origin','thumbnail'
    ];
    function getImages()
    {
        return $this->hasMany('App\Models\Image');
    }
}
