<?php

namespace App\Http\Livewire\Logistics\AuditManagement;

use App\Models\AuditOfficer;
use App\Models\AuditSchedule;
use Carbon\Carbon;
use Livewire\Component;

class Auditscheduling extends Component
{
    public $createSchedule;
    public $officer_id, $department, $date;
    public function render()
    {
        return view('livewire.logistics.audit-management.auditscheduling', [
            'officers' => AuditOfficer::all(),
            'schedules' => AuditSchedule::all(),
        ]);
    }
    public function create()
    {
        $dt = Carbon::parse($this->date)->toFormattedDateString();
        AuditSchedule::create([
            'audit_officer_id' => $this->officer_id,
            'department' => $this->department,
            'date' =>  $dt,
            'status' => 'Pending',
            'audit_id' => rand(1000, 9999)
        ]);
        toastr()->addSuccess('Schedule Create Successfully');
        $this->createSchedule = false;
        $this->reset();
    }
}
