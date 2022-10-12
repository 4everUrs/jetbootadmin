<?php

namespace App\Http\Livewire\Core\Pm;

use Livewire\Component;
use App\Models\LocalPlacement;
use App\Models\Onboard;
class Placementfee extends Component
{
    public function render()
    {
        return view('livewire.core.pm.placementfee',[
            'jobs' => LocalPlacement::all(),
        ]);
    }
    public function deploy($id){
        $job = LocalPlacement::find($id);
        Onboard::create([
            
        ]);
    }
}
