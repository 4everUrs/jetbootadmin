<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorShop extends Model
{
    use HasFactory;
     protected $fillable = [
        'item_name','condition','description','amount','file_name','status','origin','thumbnail'
    ];
}
