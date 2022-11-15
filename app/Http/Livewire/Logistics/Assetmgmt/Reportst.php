<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;


use App\Models\Report;
use App\Models\ReportsRequest;
use Livewire\Component;
use Livewire\WithPagination;

class Reportst extends Component
{
    use WithPagination;
    public $loadModal;
    public function render()
    {
        return view('livewire.logistics.assetmgmt.reportst', [
            'reports' => Report::orderBy('id', 'desc')->paginate(10),
            'requests' => ReportsRequest::all(),
        ]);
    }
    public function confirm($id)
    {
        ReportsRequest::find($id)->update([
            'status' => 'Confirmed'
        ]);
        toastr()->addSuccess('Confirm Successfully');
    }
}
