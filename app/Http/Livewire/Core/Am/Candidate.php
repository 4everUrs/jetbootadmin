<?php

namespace App\Http\Livewire\Core\Am;

use App\Models\ApplicantList;
use Livewire\Component;
use App\Models\JobCandid;
use App\Models\LocalPlacement;

class Candidate extends Component
{
    public function render()
    {
        return view('livewire.core.am.candidate',[
            'jobs' => JobCandid::all(),
        ]);
    }
    public function approve($id)
    {
        $job = ApplicantList::find($id);
        LocalPlacement::create([
            'listing_id' => $job->listing_id,
            'name' => $job->name,
            'phone' => $job->phone,
            'email' => $job->email,
            'company_name' => $job->company_name,
            'company_location' => $job->location,
            'position' => $job->position,
            'status' => 'Pending'
        ]);
        $job->status = 'Deployment';
        $job->save();
        flash()->addSuccess('Data approved successfully');
    }
}
