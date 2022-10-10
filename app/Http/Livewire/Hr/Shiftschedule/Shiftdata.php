<?php

namespace App\Http\Livewire\Hr\Shiftschedule;

use App\Models\Shift;
use Livewire\Component;
use Livewire\WithPagination;

class Shiftdata extends Component
{
    public $name, $position, $department, $monday, $tuesday , $wednesday, $thursday , $friday ,$saturday , $sunday;
    public $addRecord = false;
    public $viewModal = false;
    public $data;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        
        'name' => 'string',
        'position' => 'string',
        'department' => 'string',
        'monday' => 'string',
        'tuesday' => 'string',
        'wednesday' => 'string',
        'thursday' => 'string',
        'friday' => 'string',
        'saturday' => 'string',
        'sunday' => 'string',
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
        Shift::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }
    public function render()
    {
        return view('livewire.hr.shiftschedule.shiftdata',[
            'datas' => Shift::paginate(6),
        ]);
    }
    public function viewData($id){
        
        $this->viewModal = true;
        $this->data = Shift::find($id);
        $this->name = $this->data->name;
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Shift::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->name = null;
        $this->position = null;
        $this->department = null;
        $this->monday= null;
        $this->tuesday = null;
        $this->wednesday = null;
        $this->thursday = null;
        $this->friday = null;
        $this->saturday = null;
        $this->sunday = null;
    }


}
