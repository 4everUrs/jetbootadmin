<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    use HasFactory;
    protected $fillable = [
        'position', 'department', 'timein', 'breakin', 'breakout', 'timeout', 'date', 'status', 'user_id'
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    
}
