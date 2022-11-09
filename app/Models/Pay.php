<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 'company', 'position', 'datein', 'dateout', 'payhour', 'totalhours', 'overtime', 'latededuction',
        'penstiondeduction', 'sss', 'pagibig', 'phil', 'salary',
    ];
    
}
