<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone', 'position', 'company_name', 'company_location', 'status'
    ];
}
