<?php

namespace App\Http\Livewire\Core\Am;

use Livewire\Component;
use App\Models\ApplicantList;
class Jobcandidate extends Component
{
    public function render()
    {
        return view('livewire.core.am.jobcandidate',[
            'jobs' => ApplicantList::all(),
        ]);
    }
}
