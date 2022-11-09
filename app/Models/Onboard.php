<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onboard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'age', 'gender', 'company_name', 'position', 'contract', 'status', 'listing_id','resume_file',
        'endo','phone','email'
    ];
}
