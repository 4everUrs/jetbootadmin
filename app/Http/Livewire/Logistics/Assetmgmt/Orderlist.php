<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Buyer;
use Livewire\Component;

class Orderlist extends Component
{
    public function render()
    {
        return view('livewire.logistics.assetmgmt.orderlist', [
            'buyers' => Buyer::where('status', '!=', 'Pending')->get(),
        ]);
    }
    public function loadModal($id)
    {
        Buyer::find($id)->update(['status' => 'confirmed']);
        toastr()->addSuccess('Confirmed Successfully');
    }
}
