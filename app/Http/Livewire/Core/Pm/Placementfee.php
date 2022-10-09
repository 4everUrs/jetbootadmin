<?php

namespace App\Http\Livewire\Core\Pm;

use Livewire\Component;
use App\Models\LocalPlacement;
class Placementfee extends Component
{
    public function render()
    {
        return view('livewire.core.pm.placementfee',[
            'jobs' => LocalPlacement::all(),
        ]);
    }
}
