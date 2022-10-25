<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Models\Reorder;
use App\Models\WarehouseSent;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Reorders extends Component
{
    use WithPagination;
    public function render()
    {

        return view('livewire.logistics.procurement.reorders', [
            'reorders' => Reorder::orderBy('id', 'desc')->paginate(10),
        ]);
    }
    public function approve($id)
    {
        Reorder::find($id)->update([
            'status' => 'Aproved',
            'completion_date' => Carbon::parse(now())->toFormattedDateString(),
        ]);
        toastr()->addSuccess('Operation Successfull');
        WarehouseSent::find($id)->update(['status' => 'Approved']);
    }
}
