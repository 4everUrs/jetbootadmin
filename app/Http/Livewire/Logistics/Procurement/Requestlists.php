<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Http\Livewire\Logistics\Sidebars\Warehouse;
use Livewire\Component;
use App\Models\ProcurementRequest;
use App\Models\Recieved;
use App\Models\PostRequirement;
use App\Models\ProcurementSentRequest;
use App\Models\RequestNotification;
use App\Models\WarehouseSent;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Requestlists extends Component
{
    public $origin = 'Procurement', $description, $status = "Pending", $type = 'Supplier', $start, $end, $location;
    public $name, $qty;
    public $requestModal = false;
    public $search = '';
    public $requirements = [];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function addRow()
    {
        $this->requirements[] = [''];
    }
    public function removeRow($index)
    {

        unset($this->requirements[$index]);
        $this->requirements = array_values($this->requirements);
    }
    public function render()
    {
        $this->requirements;
        $searchFields = '%' . $this->search . '%';
        return view('livewire.logistics.procurement.requestlists', [
            'requests' => ProcurementRequest::where('origin', 'like', $searchFields)
                ->orderBy('id', 'desc')->paginate(10),
            'sents' => ProcurementSentRequest::where('description', 'like', $searchFields)
                ->orderBy('id', 'desc')->paginate(10),

        ]);
    }
    public function saveData()
    {

        $validatedData = $this->validate();

        ProcurementRequest::create($validatedData);
        $this->resetInput();
    }
    public function approve($id)
    {
        $request = ProcurementRequest::find($id);
        if ($request->status == 'Approved') {
            toastr()->addWarning('Data is already approved');
        } else {
            $request->status = 'Approved';

            $request->date_granted = Carbon::parse(now())->toFormattedDateString();
            $request->save();

            toastr()->addSuccess('Data update successfully');
            RequestNotification::create([
                'user_id' => Auth::user()->id,
                'sender' =>  Auth::user()->currentTeam->name,
                'department' => 'Logistics',
                'reciever' => 'Warehouse',
                'request_content' => 'Aprove your request',
                'routes' => 'requestlists'
            ]);
        }
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
        $validatedData['quantity'] = $this->qty;
        Recieved::create($validatedData);
        ProcurementSentRequest::create([
            'destination' => 'Vendor Portal',
            'description' => $this->description,
            'approval_date' => 'N/A',
            'remarks' => 'N/A',
            'status' => 'Pending'
        ]);
        $recieved_id = Recieved::latest('id')->first();

        foreach ($this->requirements as $index => $requirement) {
            PostRequirement::create([
                'recieved_id' => $recieved_id->id,
                'post_id' => $recieved_id->id,
                'origin' => 'Procurement',
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
    public function loadModal()
    {
        $this->requestModal = true;
    }
}
