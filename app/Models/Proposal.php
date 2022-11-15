<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'title', 'duration', 'budget', 'item_name', 'admin_status', 'finance_status', 'quantity', 'unit_cost', 'materials', 'personnel', 'start_date', 'description', 'approval_date'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function ProposalItem()
    {
        return $this->hasMany(ProposalItem::class);
    }
}
