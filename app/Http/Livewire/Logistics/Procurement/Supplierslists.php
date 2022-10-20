<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\Supplier;

class Supplierslists extends Component
{
    public function render()
    {
        return view('livewire.logistics.procurement.supplierslists', [
            'suppliers' => Supplier::get(),
        ]);
    }
    public function changeStatus($id)
    {
        if (Supplier::find($id)->status != 'Terminated') {
            Supplier::find($id)->update(['status' => 'Terminated']);
            toastr()->addSuccess('Operation Successfull');
        } else {
            toastr()->addWarning('Operation Failed');
        }
    }
}
