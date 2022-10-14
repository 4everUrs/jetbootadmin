<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\Vehicle;
use Livewire\Component;
use App\Models\Vehicleinform;
use Livewire\WithPagination;

class Vinfo extends Component
{
    public $origin = 'vinfo', $pnumber, $vmodel, $driver_name, $status = "Pending";
    public $vehicleModal = false;
    public $information = [];
    public $infoBox = [];
    public $infoTest = [];
    public $selected_id;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function saveRequest()
    {
    }
    public function render()
    {
        $this->information;
        return view('livewire.logistics.fleet.vinfo', [
            'Vehicleinforms' => Vehicleinform::orderBy('id', 'desc')->paginate(5),
            'vehicles' => Vehicle::all(),
        ]);
    }

    public function loadModal($id)
    {
        $this->selected_id = $id;
        $this->vehicleModal = true;
    }

    public function saveInfo()
    {
        $temp = Vehicle::find($this->selected_id);
        $temp->driver_name = $this->driver_name;
        $temp->save();
        toastr()->addSuccess('New Driver Assigned');
        $this->reset();
    }
}
