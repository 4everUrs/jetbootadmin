<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\MaintenanceRequest;
use App\Models\Repair;
use App\Models\RomRequestList as ModelsRomRequestList;
use Carbon\Carbon;
use Livewire\Component;

class Romrequestlist extends Component
{
    public function render()
    {
        return view('livewire.logistics.fleet.romrequestlist', [
            'requests' => MaintenanceRequest::all(),
        ]);
    }
    public function markComplete($id)
    {

        $temp = MaintenanceRequest::find($id);
        if ($temp->status != 'Completed') {
            $temp->status = 'Completed';
            $temp->completion_date = Carbon::parse(now())->toFormattedDateString();
            $temp->save();
            $x = Repair::find($id);
            $x->status = 'Completed';
            $x->save();
            toastr()->addSuccess('Operation Successful');
        } else {
            toastr()->addWarning('Already Completed');
        }
    }
}
