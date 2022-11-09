<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Building;
use App\Models\Equipment;
use App\Models\MaintenanceRequest;
use Livewire\Component;

class MaintenanceRequests extends Component
{
    public $maintenanceRequest = false;
    public $type, $category, $buildingName, $equipmentName, $description;
    public $subject;
    public function render()
    {
        if ($this->type == 'building') {
            $this->dispatchBrowserEvent('show-building');
            $this->subject = $this->buildingName;
        } elseif ($this->type == 'equipment') {
            $this->dispatchBrowserEvent('show-equipment');
            $this->subject = $this->equipmentName;
        }
        return view('livewire.logistics.assetmgmt.maintenance-requests', [
            'requests' => MaintenanceRequest::all(),
            'buildings' => Building::all(),
            'equipments' => Equipment::all(),
        ]);
    }
    public function sendRequest()
    {
        MaintenanceRequest::create([
            'subject' => $this->subject,
            'origin' => 'Asset Management',
            'category' => $this->category,
            'description' => $this->description,
            'status' => 'Pending'
        ]);
        toastr()->addSuccess('Request Send');
        $this->maintenanceRequest = false;
        $this->reset();
    }
}
