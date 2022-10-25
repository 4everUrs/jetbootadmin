<?php

namespace App\Http\Livewire\Hr\Timeaattendance;



use App\Models\Time;
use Livewire\Component;
use Livewire\WithPagination;


class Timedata extends Component
{
    public $name, $position, $department, $timein, $timeout, $date, $status;
    public $addRecord = false;
    public $viewModal = false;
    
    public $data;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|string',
        'position' => 'required|string',
        'department' => 'required|string',
        'timein' => 'required|string',
        'timeout' => 'required|string',
        'date' => 'required|string',
        'status' => 'required|string',

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
        Time::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }
    public function render()
    {
        $this->data;
        return view('livewire.hr.timeaattendance.timedata',[
            'datas' => Time::paginate(6),]);
    }
    public function viewData($id){
        
        $this->viewModal = true;
        $this->data = Time::find($id);
        $this->name = $this->data->name;
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Time::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->name = null;
        $this->position = null;
        $this->department = null;
        $this->timein= null;
        $this->timeout = null;
        $this->date= null;
        $this->status = null;
    }
}
