<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yungts97\LaravelUserActivityLog\Traits\Loggable;

class BmProposal extends Model
{
    use HasFactory;
    use Loggable;
    protected $fillable = [
        'proposalname', 'requestor', 'proposedamount', 'approvedate', 'approvedamount', 'rstatus', 'remarks', 'description', 'item_name', 'quantity', 'unit_cost', 'shipping_fee', 'tax', 'subtotal'
    ];
}
