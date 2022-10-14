<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\Building;
use App\Models\Equipment;
use App\Models\ProcurementRequest;
use App\Models\RepairRequest;
use App\Models\Vehicle;
use Livewire\Component;

class Romrequest extends Component
{
    public $repairModal = false, $autoWork = false;
    public $content;
    public $type;
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

        ]);
    }
    public function sendRequest()
    {
        ProcurementRequest::create([
            'origin' => 'M.R.O',
            'content' => $this->content,
            'status' => 'Pending'
        ]);
        toastr()->addSuccess('Request Sent Successully');
        $this->reset();
        $this->autoWork = false;
    }
}
