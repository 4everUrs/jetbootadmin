<?php

namespace App\Http\Livewire\Core\Nhb;

use Livewire\Component;
use App\Models\Onboard;
use App\Models\LocalEmployee;
class Onboarding extends Component
{
    public $showPayroll = false;
    public $name,$age,$gender,$company,$position,$status='Hired',$contract;
    protected $rules = [
        'name' => 'required|string|min:6',
        'age' => 'required|string',
        'gender' => 'required|string',
        'company' => 'required|string',
        'position' => 'required|string',
        'contract' => 'required|string',
        'status' => 'required|string',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.nhb.onboarding',[
            'onboards' => Onboard::all(),
        ]);
    }
    public function savePayroll(){
        $validateddata = $this->validate();
        
        Onboard::create($validateddata);
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showPayroll = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->age = '';  
        $this->gender = '';  
        $this->company = '';  
        $this->position = '';  
        $this->contract = ''; 
    }
    public function loadPayroll(){
        $this->showPayroll = true;
    }
}
