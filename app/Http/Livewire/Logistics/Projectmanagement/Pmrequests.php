<?php

namespace App\Http\Livewire\Logistics\Projectmanagement;

use Livewire\Component;
use App\Models\ProcurementRequest;
use App\Models\Recieved;
use App\Models\PostRequirement;
use App\Models\ProcurementSentRequest;
use App\Models\ProjectRequest;
use App\Models\RequestNotification;
use App\Models\WarehouseSent;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Pmrequests extends Component
{
    public $requestContractor;
    public $requestModal = false;
    public $requirements = [];
    public $origin = 'Project Management', $description, $status = "Pending", $type = 'Contractor', $start, $end, $location;
    public $name, $qty;
    public function render()
    {
        return view('livewire.logistics.projectmanagement.pmrequests', [
            'requests' => ProjectRequest::all(),
        ]);
    }
    public function approve($id)
    {
        ProjectRequest::find($id)->update([
            'status' => 'Approved'
        ]);
        toastr()->addSuccess('Operation Successfull');
    }
    public function addRow()
    {
        $this->requirements[] = [''];
    }
    public function removeRow($index)
    {
        unset($this->requirements[$index]);
        $this->requirements = array_values($this->requirements);
    }
    public function saveRequest()
    {

        $validatedData = $this->validate([
            'origin' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'start' => 'required|integer',
            'end' => 'required|integer',
            'location' => 'required|string'
        ]);
        $validatedData['item_name'] = $this->name;
        Recieved::create($validatedData);
        $recieved_id = Recieved::latest('id')->first();

        foreach ($this->requirements as $index => $requirement) {
            PostRequirement::create([
                'recieved_id' => $recieved_id->id,
                'post_id' => $recieved_id->id,
                'origin' => 'Project Management',
                'requirements' => $requirement['req'],
            ]);
        }
        RequestNotification::create([
            'user_id' => Auth::user()->id,
            'sender' =>  Auth::user()->currentTeam->name,
            'department' => 'Logistics',
            'reciever' => 'Vendor Portal',
            'request_content' => 'sent you a request',
            'routes' => 'recievedrequests'
        ]);
        toastr()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->requestModal = false;
    }
    public function resetInput()
    {
        $this->origin = null;
        $this->content = null;
        $this->start = null;
        $this->end = null;
        $this->requirements = [];
    }
}
