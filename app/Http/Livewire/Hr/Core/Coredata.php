<?php

namespace App\Http\Livewire\Hr\Core;

use App\Models\Core;
use Livewire\Component;
use Livewire\WithPagination;

class Coredata extends Component
{
    public $name, $work, $skill, $qualification, $education , $status = 'available';
    public $addRecord = false;
    public $viewModal = false;
    public $data;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required|string',
        'work' => 'required|string',
        'skill' => 'required|string',
        'qualification' => 'required|string',
        'education' => 'required|string',
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
        Core::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }

    public function render()
    {
        return view('livewire.hr.core.coredata',[
            'datas' => Core::paginate(6),
        ]);
    }
    public function viewData($id){
        
        $this->viewModal = true;
        $this->data = Core::find($id);
        $this->name = $this->data->name;
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
        $this->work = null;
        $this->skill = null;
        $this->qualification = null;
        $this->education = null;
        $this->status = null;
    }


}
