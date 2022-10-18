<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\ProcurementRequest;
use App\Models\Recieved;
use App\Models\PostRequirement;
use App\Models\WarehouseSent;
use Livewire\WithPagination;
use Carbon\Carbon;

class Requestlists extends Component
{
    public $origin = 'Procurement', $description, $status = "Pending", $type, $start, $end, $location;
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
            'requests' => ProcurementRequest::where('origin', 'like', $searchFields)->paginate(10),
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
        $warehouse = WarehouseSent::find($request->warehouse_sent_id);
        if ($request->status == 'Approved') {
            toastr()->addWarning('Data is already approved');
        } else {
            $request->status = 'Approved';
            $request->date_granted = Carbon::parse(now())->toFormattedDateString();
            $warehouse->status = 'Approved';
            $warehouse->save();
            $request->save();
            toastr()->addSuccess('Data update successfully');
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
        $recieved_id = Recieved::latest('id')->first();

        foreach ($this->requirements as $index => $requirement) {
            PostRequirement::create([
                'recieved_id' => $recieved_id->id,
                'post_id' => $recieved_id->id,
                'origin' => 'Procurement',
                'requirements' => $requirement['req'],
            ]);
        }
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
