<?php

namespace App\Http\Livewire\Admin;

use App\Models\Audit as ModelsAudit;
use App\Models\Stock;
use Livewire\Component;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;

class AuditTrails extends Component
{
    use WithPagination;
    public $audits;
    public function render()
    {
        return view('livewire.admin.audit-trails');
    }
    public function mount()
    {
        $this->audits = Stock::first()->audits()->latest()->first()->getMetaData();
    }
}
