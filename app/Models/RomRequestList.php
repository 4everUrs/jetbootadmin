<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RomRequestList extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin', 'Subject','Category','Description','Request_Date','DateComp'
    ];
}
