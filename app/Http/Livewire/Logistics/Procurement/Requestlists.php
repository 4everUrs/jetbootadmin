<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\ProcurementRequest;
use App\Models\Recieved;
use Livewire\WithPagination;
use Carbon\Carbon;

class Requestlists extends Component
{
    public $origin = 'Procurement', $message, $status = "Pending", $type;
    public $requestModal = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     protected $rules = [
        'origin' => 'required|string',
        'type' => 'required|string',
        'message' => 'required|string',
        'status' => 'required|string'
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.logistics.procurement.requestlists',[
            'requests' => ProcurementRequest::orderBy('id','desc')->paginate(5),
        ]);
    }
    public function saveData()
    {
        $validatedData = $this->validate();
        dd($validatedData);
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
        toastr()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->requestModal = false;
    }

    public function resetInput()
    {
        $this->origin = null;
        $this->content = null;  
    }
    public function loadModal()
    {
        $this->requestModal = true;
    }
}
