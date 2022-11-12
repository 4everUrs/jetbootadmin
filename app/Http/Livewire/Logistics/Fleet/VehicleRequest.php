<?php

namespace App\Http\Livewire\Logistics\Fleet;


use App\Models\Buyer;
use App\Models\Order;
use App\Models\ReservedVehicle;
use Livewire\Component;

class VehicleRequest extends Component
{
    public $reserveVehicle;
    public $selected_id;
    public function render()
    {
        return view('livewire.logistics.fleet.vehicle-request', [
            'orders' => Buyer::all(),
            'reservations' => ReservedVehicle::all(),
        ]);
    }
    public function requestVehicle()
    {
        $temp = Buyer::find($this->selected_id)->first();
        ReservedVehicle::create([
            'order_id' => $temp->order_id,
            'buyer_id' => $temp->id,
        ]);
        toastr()->addSuccess('Request Sent Successfully');
        $this->reserveVehicle = false;
        $this->reset();
    }
}
