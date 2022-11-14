<?php

namespace App\Http\Livewire\Logistics\AuditManagement;

use App\Models\AuditReports as ModelsAuditReports;
use Livewire\Component;

class AuditReports extends Component
{
    public function render()
    {
        return view('livewire.logistics.audit-management.audit-reports', [
            'audits' => ModelsAuditReports::all(),
        ]);
    }
}
