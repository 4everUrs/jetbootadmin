<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\ProcurementRequest;
use App\Models\Recieved;
use App\Models\PostRequirement;
use Livewire\WithPagination;
use Carbon\Carbon;

class Requestlists extends Component
{
    public $origin = 'Procurement', $description, $status = "Pending", $type, $start, $end, $location;
    public $requestModal = false;
    public $requirements = [];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     protected $rules = [
        'origin' => 'required|string',
        'type' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|string',
        'start' => 'required|integer',
        'end' => 'required|integer',
        'location' => 'required|string'
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function addRow()
    {
        $this->requirements[] = [''];
    }
    public function removeRow($index){
        
        unset($this->requirements[$index]);
        $this->requirements = array_values($this->requirements);
    }
    public function render()
    {
        $this->requirements;
        return view('livewire.logistics.procurement.requestlists',[
            'requests' => ProcurementRequest::orderBy('id','desc')->paginate(5),
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
        if($request->status == 'Approved'){
            toastr()->addWarning('Data is already approved');
        }
        else{
            $request->status = 'Approved';
            $request->save();
            toastr()->addSuccess('Data update successfully');
        }
        
    }
   
    public function saveRequest()
    {
        
        $validatedData = $this->validate();
        
        Recieved::create($validatedData);
        $recieved_id = Recieved::latest('id')->first();
        
        foreach($this->requirements as $index => $requirement){
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
