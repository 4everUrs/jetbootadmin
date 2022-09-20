<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use Livewire\Component;
use App\Models\RequestList;
use App\Models\ProcurementRequest;
use Livewire\WithPagination;
use Carbon\Carbon;

class Requestslist extends Component
{
    public $origin = 'Warehouse', $content, $status = 'Pending';
    public $destination;

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
        return view('livewire.logistics.warehouse.requestslist',[
            'requests' => RequestList::get(),
        ]);
    }

    public function sendRequest()
    {
        $validated = $this->validate();
        
        if($this->destination == "Procurement"){
            ProcurementRequest::create($validated);
            toastr()->addSuccess('Data update successfully');
             $this->resetInput();
        }
        else{
            RequestList::create($validated);
            toastr()->addSuccess('Data update successfully');
            $this->resetInput();
        }
    }
    public function resetInput()
    {
        $this->origin = null;
        $this->content = null;
        $this->origin = null;
        
    }
}
