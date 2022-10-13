<?php

namespace App\Http\Livewire\Core\Em;

use Livewire\Component;
use App\Models\LocalEmployee;
class Employeedata extends Component
{
    public function render()
    {
        return view('livewire.core.em.employeedata',[
            'onboards' => LocalEmployee::all(),
        ]);
    }
}
