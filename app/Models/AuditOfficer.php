<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditOfficer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'certificate_no', 'officer_id',
    ];
}
