<?php

namespace App\Http\Livewire\Logistics\AuditManagement;

use App\Models\AuditRecord;
use App\Models\AuditSchedule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Records extends Component
{
    use WithFileUploads;
    public $recordModal;
    public $audit_id, $audit_file;
    public function render()
    {
        return view('livewire.logistics.audit-management.records', [
            'audits' => AuditSchedule::where('status', 'Pending')->get(),
            'records' => AuditRecord::all(),
        ]);
    }
    public function sendRecord()
    {
        $file_name = $this->audit_file->getClientOriginalName();
        AuditRecord::create([
            'audit_schedule_id' => $this->audit_id,
            'audit_file' => $this->audit_file->storeAs('audit_records', $file_name, 'do'),
        ]);
        toastr()->addSuccess('Add Record Successfully');
        AuditSchedule::find($this->audit_id)->update([
            'status' => 'Done'
        ]);
        $this->recordModal = false;
        $this->reset();
    }
}
