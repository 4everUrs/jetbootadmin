<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'manager', 'contractor', 'contractor_manager', 'start_date', 'completion_date', 'progress', 'status', 'description', 'budget', 'duration', 'remarks'
    ];
}
