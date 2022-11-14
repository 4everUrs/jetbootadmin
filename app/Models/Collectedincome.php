<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collectedincome extends Model
{
    use HasFactory;
    protected $fillable = [
        'rfrom', 'caddress', 'cramount','receiptno', 'paytype', 'cremarks'
    ];
}
