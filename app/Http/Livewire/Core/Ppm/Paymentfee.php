<?php

namespace App\Http\Livewire\Core\Ppm;

use Livewire\Component;
use App\Models\Payroll;
class Paymentfee extends Component
{
    public $showPayroll = false;
    public $name,$attendance,$salary,$placement,$contribution,$collection;
    
    public function render()
    {
        return view('livewire.core.ppm.paymentfee',[
            'payrolls' => Payroll::all(),
        ]);
    }

    public function savePayroll(){
        $validateddata = $this->validate([
            'attendance' => 'required|string',
            'salary' => 'required|string',
            'contribution' => 'required|string',
        ]);
        $payroll = Payroll::find($this->name);
        $payroll->attendance = $validateddata['attendance'];
        $payroll->salary = $validateddata['salary'];
        $payroll->contribution = $validateddata['contribution'];
        $payroll->gross_salary = $validateddata['attendance'] * $validateddata['salary'];
        $payroll->save();
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showPayroll = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->attendance = '';  
        $this->salary = '';  
        $this->contribution = ''; 
    }
    public function loadPayroll(){
        $this->showPayroll = true;
    }
    public function total(){}
}
