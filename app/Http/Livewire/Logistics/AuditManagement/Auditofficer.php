<?php

namespace App\Http\Livewire\Logistics\AuditManagement;

use App\Models\AuditOfficer as ModelsAuditOfficer;
use Livewire\Component;

class Auditofficer extends Component
{
    public $addOfficerModal;
    public $name, $email, $certificate_no;
    public function render()
    {
        return view('livewire.logistics.audit-management.auditofficer', [
            'officers' => ModelsAuditOfficer::all(),
        ]);
    }
    public function createOfficer()
    {
        $this->validate([
            'certificate_no' => 'required|min:7|max:7'
        ]);
        ModelsAuditOfficer::create([
            'officer_id' => rand(1000, 9999),
            'name' => $this->name,
            'email' => $this->email,
            'certificate_no' => $this->certificate_no
        ]);
        toastr()->addSuccess('Create Officer Successfully');
        $this->addOfficerModal = false;
        $this->reset();
    }
}
