<?php

namespace App\Models\finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestedlists extends Model
{
    use HasFactory;
    protected $fillable = [
        'listoriginated', 'listcategory', 'listamount','listaccount', 'listdescription', 'liststatus'
    ];

}
