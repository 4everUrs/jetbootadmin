<?php

namespace App\Http\Livewire\Core\Am;

use App\Models\ApplicantList;
use Livewire\Component;
use App\Models\Denied;

class Deniedapplicant extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.core.am.deniedapplicant',[
            'rejected' => ApplicantList::where('status','=','Denied')->get(),
        ]);
    }
}
