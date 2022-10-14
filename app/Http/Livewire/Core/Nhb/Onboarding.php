<?php

namespace App\Http\Livewire\Core\Nhb;

use Livewire\Component;
use App\Models\Onboard;
use App\Models\LocalEmployee;
use App\Models\LocalPlacement;

class Onboarding extends Component
{
    public $showPayroll = false;
    public $name,$age,$gender,$company_name,$position,$status='Hired',$contract,$resume_file;
    
  
    public function render()
    {
        return view('livewire.core.nhb.onboarding',[
            'onboards' => Onboard::all(),
        ]);
    }
    public function savePayroll(){
        $validateddata = $this->validate([
        'age' => 'required|string',
        'gender' => 'required|string',
        'contract' => 'required|string',    
        ]);
        $onboard = Onboard::find($this->name);
        $onboard->age = $validateddata['age'];
        $onboard->gender = $validateddata['gender'];
        $onboard->contract = $validateddata['contract'];
        $onboard->save();
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showPayroll = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->age = '';  
        $this->gender = '';     
        $this->contract = '';  
    }
    public function loadPayroll(){
        $this->showPayroll = true;
    }
    public function submit($id){
        $onboard = LocalPlacement::find($id);
        LocalEmployee::create([
            'name' => $onboard->name,
            'phone' => $onboard->phone,
            'position' => $onboard->position,
            'company_name' => $onboard->company_name,
            'company_location' => $onboard->company_location,
        ]);
        flash()->addSuccess('Data Send Successfully');
    }
}
