<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRequested extends Model
{
    use HasFactory;
    protected $fillable = [
        'proposalname', 'requestor', 'proposedamount', 'approvedate', 'approvedamount', 'rstatus', 'remarks', 'origin'
    ];
}
