<?php

namespace App\Http\Livewire\Core\Ppm;

use Livewire\Component;
use App\Models\Payroll;
class Paymentfee extends Component
{
    public $showPayroll = false;
    public $name,$attendance,$salary,$placement,$contribution,$collection;
    protected $rules = [
        'name' => 'required|string|min:6',
        'attendance' => 'required|string',
        'salary' => 'required|string',
        'contribution' => 'required|string',
        'placement' => 'required|string',
        'collection' => 'required|string'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.ppm.paymentfee',[
            'payrolls' => Payroll::all(),
        ]);
    }
    public function savePayroll(){
        $validateddata = $this->validate();
        
        Payroll::create($validateddata);
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
        $this->placement = '';  
        $this->collection = '';  
    }
    public function loadPayroll(){
        $this->showPayroll = true;
    }

    public function request()
    {
        
    }
}
