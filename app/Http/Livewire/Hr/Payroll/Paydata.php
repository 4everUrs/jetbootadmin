<?php

namespace App\Http\Livewire\Hr\Payroll;

use App\Models\Pay;
use Livewire\Component;
use Livewire\WithPagination;

class Paydata extends Component
{
    public $aggreement = false;
    public $name,$company,$position,$datein,$dateout,$payhour,$totalhours,$overtime,$latededuction,$penstiondeduction,$sss,$pagibig,$phil,$salary;
    public $printModal = false;
    public $selected_id;
    protected $rules = [
        'name' => 'required|string',
        'company' => 'required|string',
        'position' => 'required|string',
        'datein' => 'required|string',
        'dateout' => 'required|string',
        'payhour' => 'required|integer',
        'totalhours' => 'required|integer',
        'overtime' => 'required|integer',   
        'latededuction' => 'required|integer',
        'sss' => 'required|integer',
        'pagibig' => 'required|integer',
        'phil' => 'required|integer',
        'penstiondeduction' => 'required|integer',
        'salary' => 'required|integer'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function render()
    {
        return view('livewire.hr.payroll.paydata',[
            'pays' => Pay::all(),
        ]);
    }
    public function paySave(){
        Pay::create([
            'name' => $this->name,
            'company' => $this->company,
            'position' => $this->position,
            'datein' => $this->datein,
            'dateout' => $this->dateout,
            'payhour' => $this->payhour,
            'totalhours' => $this->totalhours,
            'overtime' => $this->overtime,
            'latededuction' => $this->latededuction,
            'sss' => $this->sss,
            'pagibig' => $this->pagibig,
            'phil' => $this->phil,
            'penstiondeduction' => $this->sss + $this->pagibig + $this->phil,
            'salary' => $this->payhour * $this->totalhours + $this->overtime*84 - $this->latededuction - $this->sss - $this->pagibig - $this->phil, 
        ]);
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->aggreement = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->company = '';
        $this->position = '';
        $this->datein = '';
        $this->dateout = '';
        $this->payhour = '';  
        $this->totalhours = '';  
        $this->overtime = '';
        $this->latededuction = '';  
        $this->penstiondeduction = '';
        $this->sss = '';
        $this->pagibig = '';  
        $this->phil = '';
        $this->salary = '';
    }
    public function loadPayroll(){
        $this->aggreement = true;
    }
    public function viewModal($id)
    {
        $this->selected_id=$id;
        $this->printModal = true;
    }
    public function download()
    {
        return redirect()->route('downloadcontract',['id'=> $this->selected_id]);
    }
}
