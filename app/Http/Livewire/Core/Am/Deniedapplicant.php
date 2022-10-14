<?php

namespace App\Http\Livewire\Core\Am;

use Livewire\Component;
use App\Models\Denied;

class Deniedapplicant extends Component
{
    public function render()
    {
        return view('livewire.core.am.deniedapplicant',[
            'jobs' => Denied::all(),
        ]);
    }
}
