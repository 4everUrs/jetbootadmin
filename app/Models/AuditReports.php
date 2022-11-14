<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditReports extends Model
{
    use HasFactory;
    protected $fillable = [
        'audit_file', 'origin'
    ];
}
