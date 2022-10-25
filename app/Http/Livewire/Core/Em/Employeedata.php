<?php

namespace App\Http\Livewire\Core\Em;

use Livewire\Component;
use App\Models\LocalEmployee;
use App\Models\Payroll;
use App\Models\LocalPlacement;

class Employeedata extends Component
{
    public $Employee = false;
    public $showEmployee = false;
    public $name, $attendance, $salary, $placement, $contribution = [], $collection;
    public $method,$bank_name,$bank_account;
    public $selected_id;
    public $sss_no, $philhealth_no, $pagibig_no;
    public function render()
    {
        if($this->method == 'bank'){
            $this->dispatchBrowserEvent('show-bank');
        }
        return view('livewire.core.em.employeedata', [
            'onboards' => LocalEmployee::all(),
        ]);
    }
    
    public function loadEmployee()
    {
        $this->showEmployee = true;
    }
    public function employee($id)
    {
        $this->Employee = true;
        $this->selected_id = $id;
    }
    public function submit($id)
    {
        $onboard = LocalPlacement::find($id);

        if($onboard->status == 'Employed'){
            flash()->addWarning('Data is already submitted');
        }
        else{
            $onboard->status = 'Employed';
            Payroll::create([
            'name' => $onboard->name,
            'placement' => $onboard->placement
        ]);
            $onboard->save();
            flash()->addSuccess('Data submitted successfully');
        }
    }
    public function saveEmployee()
    {
      
       if($this->method == 'cash'){
 
        LocalEmployee::find($this->selected_id)->update([
            'sss' => $this->sss_no,
            'philhealth' => $this->philhealth_no,
            'pagibig' => $this->pagibig_no,
            'method' => $this->method,
        ]);
        $this->reset();
         flash()->addSuccess('Data submitted successfully');
         $this->Employee = false;
       }elseif($this->method == 'bank'){
 
        LocalEmployee::find($this->selected_id)->update([
            'sss' => $this->sss_no,
            'philhealth' => $this->philhealth_no,
            'pagibig' => $this->pagibig_no,
            'method' => $this->method,
            'bank_name' => $this->bank_name,
            'bank_account' => $this->bank_account,
        ]);
        $this->reset();
        flash()->addSuccess('Data submitted successfully');
        $this->Employee = false;
       }

    }
}
