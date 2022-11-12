<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\ReservedVehicle;
use App\Models\ReserveInforms;
use App\Models\Vehicle;
use Livewire\Component;

class Reservation extends Component
{
    public $assignModal = false;
    public $selected_id, $selected_vehicle;
    public function render()
    {
        return view('livewire.logistics.fleet.reservation', [
            'reservations' => ReservedVehicle::all(),
            'vehicles' => Vehicle::where('status', 'Available')->get(),
        ]);
    }
    public function loadModal($id)
    {
        $this->assignModal = true;
        $this->selected_id = $id;
    }
    public function assignVehicle()
    {
        ReservedVehicle::find($this->selected_id)->update([
            'vehicle_id' => $this->selected_vehicle,
        ]);
        Vehicle::find($this->selected_vehicle)->update(['status' => 'Reserved']);
        toastr()->addSuccess('Save Successfully');
        $this->assignModal = false;
    }
}
