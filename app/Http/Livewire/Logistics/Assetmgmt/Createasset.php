<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Building;
use App\Models\Equipment;
use App\Models\Vehicle;
use Carbon\Carbon;
use Livewire\Component;

class Createasset extends Component
{
    public $type;
    public $name, $contractor, $location, $date, $cost, $specs, $status = 'Completed';
    public $brand, $model, $condition, $vehicleType, $plate;
    public $equipmentType, $quantity, $description;
    public function render()
    {
        if ($this->type == 'building') {
            $this->dispatchBrowserEvent('building-form');
        } elseif ($this->type == 'vehicle') {
            $this->dispatchBrowserEvent('vehicle-form');
        } elseif ($this->type == 'equipment') {
            $this->dispatchBrowserEvent('equipment-form');
        }
        return view('livewire.logistics.assetmgmt.createasset');
    }
    public function createAsset()
    {
        $validatedData = $this->validate([
            'name' => 'required|',
            'contractor' => 'required',
            'location' => 'required|string',
            'date' => 'required|string',
            'cost' => 'required|integer',
            'specs' => 'required|string',
            'status' => 'required|string',
        ]);
        $validatedData['date'] = Carbon::parse($this->date)->toFormattedDateString();
        $validatedData['status'] = $this->status;
        Building::create($validatedData);
        toastr()->addSuccess('New asset created');
        $this->reset();
    }
    public function createVehicle()
    {
        $validatedData = $this->validate([
            'type' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'plate' => 'required|string',
            'condition' => 'required|string',
            'cost' => 'required|integer',
        ]);
        $validatedData['type'] = $this->vehicleType;
        $validatedData['status'] = 'Available';
        Vehicle::create($validatedData);
        toastr()->addSuccess('New vehicle created');
        $this->reset();
    }
    public function createNewEquipment()
    {
        $validatedData = $this->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'cost' => 'required|integer',
        ]);
        $validatedData['type'] = $this->equipmentType;
        Equipment::create($validatedData);
        toastr()->addSuccess('New equipment added');
        $this->reset();
    }
}
