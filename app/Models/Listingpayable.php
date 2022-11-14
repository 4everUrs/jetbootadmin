<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listingpayable extends Model
{
    use HasFactory;
    protected $fillable = [

        'lpname', 'lpattachment', 'lpremarks', 'lpstatus'
    ];
}
