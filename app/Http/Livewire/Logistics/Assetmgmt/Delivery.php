<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Buyer;
use Livewire\Component;

class Delivery extends Component
{
    public $requestForm;
    public function render()
    {
        return view('livewire.logistics.assetmgmt.delivery', [
            'orders' => Buyer::where('status', 'confirmed')->get(),
        ]);
    }
}
