<?php

namespace App\Http\Livewire\Hr\Leavemanagement;

use Livewire\Component;
use App\Models\Leave;
use Livewire\WithPagination;

class Leavedata extends Component
{
    public $name, $type, $position, $reason, $datestart, $dateend , $status = 'Pending';
    public $addRecord = false;
    public $viewModal = false;
    public $data;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required|string',
        'type' => 'required|string',
        'position' => 'required|string',
        'reason' => 'required|string',
        'datestart' => 'required|string',
        'dateend' => 'required|string',
        'status' => 'required|string'
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function showModal()
    {
        $this->addRecord = true;
    }
    public function saveData()
    {
        $validatedData = $this->validate();
        Leave::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }
    public function render()
    {
        return view('livewire.hr.leavemanagement.leavedata',[
            'datas' => Leave::paginate(6),
        ]);
    }
    public function viewData($id){
        
        $this->viewModal = true;
        $this->data = Leave::find($id);
        $this->name = $this->data->name;
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Leave::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->name = null;
        $this->type = null;
        $this->position = null;
        $this->reason = null;
        $this->datestart = null;
        $this->dateend = null;
    }
    
}
