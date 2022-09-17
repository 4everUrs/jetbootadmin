<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\ProcurementRequest;
use Livewire\WithPagination;

class Requestlists extends Component
{
    public $origin, $content, $status = "Pending";
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     protected $rules = [
        'origin' => 'required|min:6',
        'content' => 'required|string',
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

    public function resetInput()
    {
        $this->origin = null;
        $this->content = null;  
    }
}
