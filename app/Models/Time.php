<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'position', 'department', 'timein', 'timeout', 'date', 'status', 'breakin', 'breakout', 'user_id'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
