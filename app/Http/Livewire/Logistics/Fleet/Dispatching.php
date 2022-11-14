<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\Buyer;
use Livewire\Component;

class Dispatching extends Component
{
    public function render()
    {
        return view('livewire.logistics.fleet.dispatching', [
            'orders' => Buyer::with('ReservedVehicle')->orderBy('id', 'desc')->get(),
        ]);
    }
    public function dispatch($id)
    {
        Buyer::find($id)->update([
            'status' => 'transit',
        ]);
        toastr()->addSuccess('Dispatched Successfully');
    }
    public function deliver($id)
    {
        Buyer::find($id)->update([
            'status' => 'delivered',
        ]);
        toastr()->addSuccess('Shipping Completed');
    }
}
