<?php

namespace App\Http\Livewire\Core\Am;

use App\Models\ApplicantForm;
use Livewire\Component;
use App\Models\ApplicantList;
use App\Models\LocalPlacement;
use App\Models\InternationalPlacement;

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
       $job = ApplicantForm::find($id);
 
       LocalPlacement::create([
            'name' => $job->name,
            'phone' => $job->phone,
            'email' => $job->email,
            'company_name' => $job->company,
            'company_location' => $job->location,
            'position' => $job->position,
            'status' => $job->status,
            
       ]);
       flash()->addSuccess('Data Approved Successfully');
    }
}
