<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

use App\Models\Supplier;
use Livewire\Component;

class Supplierlist extends Component
{
    public $testOnly = false;

    public $selection1;
    public $selection2 = [];
    public $set;

    public function render()
    {
        return view('livewire.logistics.vendorportal.supplierlist', [
            'suppliers' => Supplier::all(),
        ]);
    }
}
