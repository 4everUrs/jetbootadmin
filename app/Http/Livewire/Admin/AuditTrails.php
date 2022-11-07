<?php

namespace App\Http\Livewire\Admin;

use App\Models\Audit as ModelsAudit;
use App\Models\Stock;
use Livewire\Component;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;
use Yungts97\LaravelUserActivityLog\Models\Log;
use Jenssegers\Agent\Agent;

class AuditTrails extends Component
{
    use WithPagination;
    public $logs;
    public function render()
    {
        $this->logs = Log::all();
        // dd($this->logs);
        return view('livewire.admin.audit-trails');
    }
    // public function mount()
    // {
    //     $agent = new Agent();
    //     dd($agent->browser());
    // }
}
