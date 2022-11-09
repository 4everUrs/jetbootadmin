<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Models\Reorder;
use Livewire\Component;

class Reorders extends Component
{
    public function render()
    {
        return view('livewire..logistics.procurement.reorders', [
            'reorders' => Reorder::all(),
        ]);
    }
}
