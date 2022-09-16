<?php

namespace App\Http\Livewire\Hr\Leavemanagement;

use Livewire\Component;
use App\Models\Leave;
use Livewire\WithPagination;

class Leavedata extends Component
{
    public $name, $type, $position, $reason, $status = 'Pending';
    public $leaveModal = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required|string',
        'type' => 'required|string',
        'position' => 'required|string',
        'reason' => 'required|string',
        'status' => 'required|string'
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.hr.leavemanagement.leavedata',[
            'datas' => Leave::paginate(3),
        ]);
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
    }
    
}
