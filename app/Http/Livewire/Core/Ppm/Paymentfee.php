<?php

namespace App\Http\Livewire\Core\Ppm;

use Livewire\Component;
use App\Models\Payroll;
class Paymentfee extends Component
{
    public $showPayroll = false;
    public $name,$attendance,$salary,$placement,$contribution;
    protected $rules = [
        'name' => 'required|string',
        'attendance' => 'required|string',
        'salary' => 'required|string',
        'contribution' => 'required|string',
        'placement' => 'required|string'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.ppm.paymentfee');
    }
    public function saveRequest(){
        $validateddata = $this->validate();
        Payroll::create($validateddata);
        $this->resetInput();
        $this->showPayroll = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->attendance = '';  
        $this->salary = '';  
        $this->contribution = '';  
        $this->placement = '';  
    }
    public function loadPayroll(){
        $this->showPayroll = true;
    }
}
