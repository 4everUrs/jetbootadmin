<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\RomRequestList as ModelsRomRequestList;
use Livewire\Component;

class Romrequestlist extends Component
{
    public function render()
    {
        return view('livewire.logistics.fleet.romrequestlist', [
            'requests' => RomRequestList::all(),

        ]);
    }
}
