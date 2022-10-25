<?php

namespace App\Http\Livewire\Hr\Payroll;

use App\Models\Pay;
use Livewire\Component;
use Livewire\WithPagination;

class Paydata extends Component
{
    public $name, $payhour, $totalhours, $overtime, $latededuction , $penstiondeduction, $salary;

    public $payModal = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        
        'name' => 'required|string',
        'payhour' => 'required|string',
        'totalhours' => 'required|string',
        'overtime' => 'required|string',
        'latededuction' => 'required|string',
        'penstiondeduction' => 'required|string',
        'salary' => 'required|string'
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.hr.payroll.paydata',[
            'datas' => Pay::paginate(6),
        ]);
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Pay::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->name = null;
        $this->payhour = null;
        $this->totalhours= null;
        $this->overtime = null;
        $this->latededuction = null;
        $this->penstiondeduction = null;
        $this->salary = null;
    }
}
