<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'audit_officer_id', 'status', 'department', 'date', 'audit_id'
    ];
    public function AuditOfficer()
    {
        return $this->belongsTo(AuditOfficer::class);
    }
}
