<?php

namespace App\Http\Livewire\Core\Am;

use Livewire\Component;
use App\Models\ApplicantList;
use App\Models\LocalPlacement;

class Jobcandidate extends Component
{
    public function render()
    {
        return view('livewire.core.am.jobcandidate',[
            'jobs' => ApplicantList::all(),
        ]);
    }
    public function approve($id)
    {
       $job = ApplicantList::find($id);
       LocalPlacement::create([
            'name' => $job->name,
            'placement' => $job->placement,
            'papers' => $job->papers,
            'location' => $job->location,
            'ticket' => $job->ticket,
       ]);
       flash()->addSuccess('Data Approved Successfully');
    }
    public function approved($id)
    {
       $job = ApplicantList::find($id);
       LocalPlacement::create([
            'company' => $job->company,
            'name' => $job->name,
            'email' => $job->email,
            'location' => $job->location,
       ]);
       flash()->addSuccess('Data Approved Successfully');
    }
}
