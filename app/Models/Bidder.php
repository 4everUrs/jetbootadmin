<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'status', 'bid_amount', 'bid_proposal_file', 'bidder_id'
    ];
    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
    public function Bidder()
    {
        return $this->belongsTo(Bidder::class);
    }
}
