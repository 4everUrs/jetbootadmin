<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\Building;
use App\Models\Equipment;
use App\Models\MaintenanceRequest;
use App\Models\MroRequest;
use App\Models\ProcurementRequest;
use App\Models\Repair;
use App\Models\RepairRequest;
use App\Models\Vehicle;
use App\Models\Workshop;
use Livewire\Component;

class Romrequest extends Component
{
    public $repairModal = false, $autoWork = false;
    public $content, $location, $description;
    public $type;
    public $category, $vehicleName, $buildingName, $equipmentName, $workshopName;
    public function render()
    {
        if ($this->type == 'building') {
            $this->dispatchBrowserEvent('show-building');
        } elseif ($this->type == 'vehicle') {
            $this->dispatchBrowserEvent('show-vehicle');
        } elseif ($this->type == 'equipment') {
            $this->dispatchBrowserEvent('show-equipment');
        }
        return view('livewire.logistics.fleet.romrequest', [
            'buildings' => Building::all(),
            'vehicles' => Vehicle::all(),
            'equipments' => Equipment::all(),
            'workshops' => Workshop::where('status', '=', 'Granted')->get(),
            'repairVehicles' => Repair::where('type', '=', 'vehicle')->get(),
            'requests' => MaintenanceRequest::all(),

        ]);
    }
    public function sendRequest()
    {
        MroRequest::create([
            'type' => 'workshop',
            'location' => $this->location,
            'origin' => 'M.R.O',
            'content' => $this->content,
            'status' => 'Pending'
        ]);
        toastr()->addSuccess('Request Sent Successully');
        $this->reset();
        $this->autoWork = false;
    }
    public function saveRecord()
    {
        if ($this->type == 'building') {
            dd('building');
        } elseif ($this->type == 'vehicle') {
            $temp = Vehicle::find($this->vehicleName);
            Repair::create([
                'name' => $temp->brand . ' ' . $temp->model,
                'type' => $this->type,
                'category' => $this->category,
                'plate' => $temp->plate,
                'workshop' => $this->workshopName,
                'status' => 'On-Going',
                'description' => $this->description,
            ]);
            $this->repairModal = false;
        } elseif ($this->type == 'equipment') {
            dd('equipment');
        }
    }
}
