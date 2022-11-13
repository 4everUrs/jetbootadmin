<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'position', 'email', 'phone', 'address', 'company', 'location', 'resume_file'
    ];
}
