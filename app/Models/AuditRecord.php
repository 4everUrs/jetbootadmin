<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditRecord extends Model
{
    use HasFactory;
    public $fillable = [
        'audit_schedule_id', 'audit_file'
    ];
    public function AuditSchedule()
    {
        return $this->belongsTo(AuditSchedule::class);
    }
}
