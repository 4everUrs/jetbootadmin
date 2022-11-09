<?php

namespace App\Http\Livewire\Hr\Employeelist;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Livewire\WithPagination;

class Employee extends Component
{
    public $name, $company, $department, $position, $gender, $address , $mobile, $email , $datehire ,$endo;
    public $addRecord = false;
    public $viewModal = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        
        'name' => 'string',
        'company' => 'string',
        'department' => 'string',
        'position' => 'string',
        'gender' => 'string',
        'address' => 'string',
        'mobile' => 'string',
        'email' => 'string',
        'datehire' => 'string',
        'endo' => 'string',
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function showModal()
    {
        $this->addRecord = true;
    }
    public function render()
    {
        return view('livewire.hr.employeelist.employee',[
            'datas' => ModelsEmployee::paginate(6)
        ]);
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        ModelsEmployee::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function saveData()
    {
        $validatedData = $this->validate();
        ModelsEmployee::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }
    public function resetInput(){
        $this->name = null;
        $this->company = null;
        $this->department = null;
        $this->position = null;
        $this->gender= null;
        $this->address = null;
        $this->mobile = null;
        $this->email = null;
        $this->datehire = null;
        $this->endo = null;
    }
    
}
