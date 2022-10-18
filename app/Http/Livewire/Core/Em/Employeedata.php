<?php

namespace App\Http\Livewire\Core\Em;

use Livewire\Component;
use App\Models\LocalEmployee;
use App\Models\Payroll;
use App\Models\LocalPlacement;

class Employeedata extends Component
{
    public function render()
    {
        return view('livewire.core.em.employeedata', [
            'onboards' => LocalEmployee::all(),
        ]);
    }
    public function submit($id)
    {
        $onboard = LocalPlacement::find($id);
        Payroll::create([
            'name' => $onboard->name,
            'placement' => $onboard->placement
        ]);
        flash()->addSuccess('Data Send Successfully');
    }
}
