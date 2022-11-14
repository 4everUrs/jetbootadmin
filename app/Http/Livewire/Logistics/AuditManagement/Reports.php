<?php

namespace App\Http\Livewire\Logistics\AuditManagement;

use App\Models\AuditReports;
use Livewire\Component;

class Reports extends Component
{
    public function render()
    {
        return view('livewire.logistics.audit-management.reports', [
            'audits' => AuditReports::all(),
        ]);
    }
}
