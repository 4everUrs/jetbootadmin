<?php

namespace App\Http\Livewire\Core\Ppm;

use App\Models\LocalEmployee;
use App\Models\Payroll;
use Livewire\Component;

class Budgetproposal extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.core.ppm.budgetproposal',[
            'payrolls' => LocalEmployee::all(),
        ]);
    }
}
