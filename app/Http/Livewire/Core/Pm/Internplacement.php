<?php

namespace App\Http\Livewire\Core\Pm;

use Livewire\Component;
use App\Models\InternationalPlacement;
class Internplacement extends Component
{
    public function render()
    {
        return view('livewire.core.pm.internplacement',[
            'jobs' => InternationalPlacement::all(),
        ]);
    }
}
