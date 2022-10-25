<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Reportst extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.logistics.assetmgmt.reportst', [
            'reports' => Report::orderBy('id', 'desc')->paginate(10),
        ]);
    }
}
