<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collectedincome extends Model
{
    use HasFactory;
    protected $fillable = [
        'cname', 'caccountno', 'cdescription','cparticular', 'creference', 'cdatereceive', 'cmodeofpayment', 'camount','grandcollection'
    ];
}
