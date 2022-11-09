<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iinterview extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','position','email','resume_file','time','date','venue','person','status'
    ];
}
