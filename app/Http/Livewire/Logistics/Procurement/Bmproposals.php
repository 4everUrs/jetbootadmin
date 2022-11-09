<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Models\Reorder;
use Livewire\Component;

class Bmproposals extends Component
{
    public function render()
    {
        return view('livewire..logistics.procurement.bmproposals', [
            'reorders' => Reorder::with('Supplier')->get(),
        ]);
    }
}
