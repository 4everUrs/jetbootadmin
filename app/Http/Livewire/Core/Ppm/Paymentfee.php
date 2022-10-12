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
    public function edit($id){
        $payrolls = Payroll::find($id);
        $this->name=$payrolls->name;
        $this->attendance=$payrolls->attendance;
        $this->salary=$payrolls->salary;
        $this->contribution=$payrolls->contribution;
        $this->placement=$payrolls->placement;

        $this->showPayroll = true;
    }
    public function save(){
        
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

    public function request()
    {
        
    }
}
