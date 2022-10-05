<?php

namespace App\Http\Livewire\Hr\Core;

use App\Models\Core;
use Livewire\Component;
use Livewire\WithPagination;

class Coredata extends Component
{
    public $name, $type, $position, $reason, $datestart, $dateend , $status = 'Pending';
    public $CoreModal = false;
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

    public function render()
    {
        return view('livewire.hr.core.coredata',[
            'datas' => Core::paginate(6),
        ]);
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Core::create($validatedData);
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
