<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidder extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','address','phone','email','status','bid_amount','bid_proposal_file'
    ];
}
