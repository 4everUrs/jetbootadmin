<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_id','file_name'
    ];
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
