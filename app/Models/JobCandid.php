<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCandid extends Model
{
    use HasFactory;
    protected $fillable = [
        'iinterview_id', 'status'
    ];
    public function Iinterview()
    {
        return $this->belongsTo(Iinterview::class);
    }
}
