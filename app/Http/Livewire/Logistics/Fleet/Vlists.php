<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\Vehicle;
use Livewire\Component;

class Vlists extends Component
{
    public $status = '-';
    public function render()
    {
        return view('livewire.logistics.fleet.vlists', [
            'available' => Vehicle::where('status', '=', 'Available')->get(),
            'repairing' => Vehicle::where('status', '=', 'Repairing')->get(),
        ]);
    }
    public function changeStatus($id)
    {
        if ($this->status == '-') {
            toastr()->addWarning('Select an Option');
        } else {
            Vehicle::find($id)->update(['status' => $this->status]);
            toastr()->addSuccess('Change Status Success');
        }
    }
}
