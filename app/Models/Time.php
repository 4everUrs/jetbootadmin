<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'position', 'department', 'timein', 'breakin', 'breakout', 'timeout', 'date', 'status',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Employer()
    {
        return $this->belongsTo(Employee::class);
    }
}
