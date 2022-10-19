<?php

namespace App\Http\Livewire\Core\Nhb;

use Livewire\Component;
use App\Models\Onboard;
use App\Models\LocalEmployee;
use App\Models\LocalPlacement;

class Onboarding extends Component
{
    public $showOnboard = false;
    public $name, $age, $gender, $company_name, $position, $status = 'Hired', $contract, $resume_file;


    public function render()
    {
        return view('livewire.core.nhb.onboarding', [
            'onboards' => Onboard::all(),
        ]);
    }
    public function saveOnboard()
    {
        $validateddata = $this->validate([
            'age' => 'required|string',
            'gender' => 'required|string',
            'contract' => 'required|string',
        ]);
        Onboard::find($this->name)->update($validateddata);
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showOnboard = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->age = '';
        $this->gender = '';
        $this->contract = '';
    }
    public function loadOnboard()
    {
        $this->showOnboard = true;
    }
    public function submit($id)
    {
        $onboard = LocalPlacement::find($id);

        if($onboard->status == 'Deployed'){
            flash()->addWarning('Data is already approved');
        }
        else{
            $onboard->status = 'Deployed';
           LocalEmployee::create([
            'name' => $onboard->name,
            'phone' => $onboard->phone,
            'position' => $onboard->position,
            'company_name' => $onboard->company_name,
            'company_location' => $onboard->company_location,
        ]);
            $onboard->save();
            flash()->addSuccess('Data approved successfully');
        }
    }
}
