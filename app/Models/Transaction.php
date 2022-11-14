<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'list_requested_id','status'
    ];
    public function ListRequested()
    {
        return $this->belongsTo(ListRequested::class);
    }
}
