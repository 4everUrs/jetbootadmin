<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use OwenIt\Auditing\Models\Audit;

class AuditTrails extends Component
{

    public function render()
    {
        return view('livewire.admin.audit-trails');
    }
}
