<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Building;
use Carbon\Carbon;
use Livewire\Component;

class Createasset extends Component
{
    public $type;
    public $name, $contractor, $location, $date, $cost, $specs;
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
            'specs' => 'required|string'
        ]);
        $validatedData['date'] = Carbon::parse($this->date)->toFormattedDateString();
        Building::create($validatedData);
        toastr()->addSuccess('New asset created');
        $this->reset();
    }
}
