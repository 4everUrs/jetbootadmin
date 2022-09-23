<?php

namespace App\Http\Livewire\Core\Recruit;

use Livewire\Component;
use App\Models\Vacant;
class Jobvacant extends Component
{
    public function render()
    {
        return view('livewire.core.recruit.jobvacant',[
            'vacants' => Vacant::get(),
        ]);

    }
}
