<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'proposal_id', 'item_name', 'quantity', 'unit_cost', 'personnel', 'materials'
    ];
    public function ProposalItem()
    {
        $this->belongsTo(Proposal::class);
    }
}
