<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use Livewire\Component;
use App\Models\RequestList;
use App\Models\ProcurementRequest;
use Livewire\WithPagination;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\Shop;

class Requestslist extends Component
{
    public $origin = 'Warehouse', $content, $status = 'Pending';
    public $destination;
    public $requestModal = false;

    public $item_name, $condition, $description, $amount, $file_name;

    use WithPagination;
    use WithFileUploads;
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
        if($this->destination == '3'){
            $this->dispatchBrowserEvent('vendor-form');
        }
        return view('livewire.logistics.warehouse.requestslist',[
            'requests' => RequestList::get(),
        ]);
    }

    public function showModal()
    {
        $this->requestModal = true;
    }

    public function sendRequest()
    {
        $validated = $this->validate();
        
        if($this->destination == "Procurement"){
            ProcurementRequest::create($validated);
            toastr()->addSuccess('Request send successfully');
             $this->resetInput();
        }
        elseif($this->destination == "Fleet Management"){
            toastr()->addSuccess('Data update successfully');
             $this->resetInput();
        }
        else{
            
            toastr()->addError('Please fill up correctly');
            $this->resetInput();
        }
    }
    public function saveItem()
    {
        if($this->destination == '1')
        {
            dd('1');
        }
        elseif($this->destination == '2')
        {
            dd('2');
        }
        elseif($this->destination == '3')
        {
            
            $validatedData = $this->validate([
                'item_name' => 'required|string',
                'condition' => 'required|string',
                'description' => 'required|string',
                'amount' => 'required|integer',
                'file_name' => 'image'
            ]);
            $validatedData['file_name'] = $this->file_name->store('shop','public');
            Shop::create($validatedData);
            toastr()->addSuccess('Request Success sent!.');
            $this->resetInput();
            $this->requestModal = false;
        }
        else{
            dd('error');
        }
    }
    public function resetInput()
    {
        $this->origin = null;
        $this->content = null;
        $this->item_name = null;
        $this->condition = null;
        $this->description = null;
        $this->amount = null;
        $this->file_name = null;
        
    }
}
