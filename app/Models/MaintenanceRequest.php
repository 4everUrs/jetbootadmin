<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject', 'description', 'completion_date', 'category', 'status', 'origin', 'vehicle_id'
    ];
}
