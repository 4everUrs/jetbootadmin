<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Report;
use Livewire\Component;

class Reportst extends Component
{
    public function render()
    {
        return view('livewire.logistics.assetmgmt.reportst', [
            'reports' => Report::all()
        ]);
    }
}
