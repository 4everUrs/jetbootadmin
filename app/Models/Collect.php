<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    use HasFactory;
    protected $fillable = [
        'rfrom', 'address', 'cramount','receiptno', 'paytype', 'cramount','cremarks'
    ];
}
