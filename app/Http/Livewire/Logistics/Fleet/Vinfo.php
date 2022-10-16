<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\MaintenanceRequest;
use App\Models\Vehicle;
use Livewire\Component;
use App\Models\Vehicleinform;
use Livewire\WithPagination;

class Vinfo extends Component
{
    public $origin = 'vinfo', $pnumber, $vmodel, $driver_name, $status = "Pending";
    public $repair = false;
    public $modalRepair = false;
    public $information = [];
    public $infoBox = [];
    public $infoTest = [];
    public $selected_id;
    public $description, $category;
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
    public function sendRepair()
    {
        $temp = Vehicle::find($this->selected_id);
        MaintenanceRequest::create([
            'origin' => 'Fleet Management',
            'subject' => $temp->brand . ' ' . $temp->model,
            'category' => $this->category,
            'description' => $this->description,
            'status' => $this->status,
        ]);
        $temp->status = 'Maintenance';
        $temp->save();
        toastr()->addSuccess('Request Sent');
        $this->repair = false;
        $this->reset();
    }
    public function saveInfo()
    {
        $temp = Vehicle::find($this->selected_id);
        $temp->driver_name = $this->driver_name;
        $temp->save();
        toastr()->addSuccess('New Driver Assigned');
        $this->reset();
    }
    public function repairModal($id)
    {
        $this->repair = true;
        $this->selected_id = $id;
    }
    public function sendRequest()
    {
        $temp = Vehicle::find($this->selected_id);
        MaintenanceRequest::create([
            'subject' => $temp->brand . ' ' . $temp->model,
            'description' => $this->description,
            'category' => $this->category,
            'status' => 'Pending',
            'origin' => 'Fleet Management'
        ]);
        $temp->status = 'Maintenance';
        $temp->save();
        toastr()->addSuccess('New Driver Assigned');
        $this->reset();
        $this->modalRepair = false;
    }
}
