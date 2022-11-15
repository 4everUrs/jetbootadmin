<?php

namespace App\Http\Livewire\Logistics\AuditManagement;

use App\Models\AuditReports;
use App\Models\ReportsRequest;
use App\Models\RequestList;
use Livewire\Component;

class Reports extends Component
{
    public $loadModal, $content, $department;
    public function render()
    {
        return view('livewire.logistics.audit-management.reports', [
            'audits' => AuditReports::all(),
        ]);
    }
    public function send()
    {
        if ($this->department == 'asset') {
            ReportsRequest::create([
                'origin' => 'Audit Management',
                'content' => $this->content,
                'status' => 'Pending'
            ]);
            $this->loadModal = false;
            toastr()->addSuccess('Request Sent');
        } elseif ($this->department == 'warehouse') {
            RequestList::create([
                'origin' => 'Audit Management',
                'content' => $this->content,
                'status' => 'Pending'
            ]);
            $this->loadModal = false;
            toastr()->addSuccess('Request Sent');
        } elseif ($this->department == 'general') {
            $this->loadModal = false;
            toastr()->addSuccess('Request Sent');
        }
    }
}
