<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'title', 'duration', 'budget', 'requested_by', 'status'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
