<?php

namespace App\Http\Livewire\Core\Am;

use Livewire\Component;
use App\Models\ApplicantForm;
use App\Models\Onboard;
use App\Models\JobPost;
class Jobcandidate extends Component
{
    public function render()
    {
        return view('livewire.core.am.jobcandidate',[
            'jobs' => ApplicantForm::all(),
        ]);
    }
    public function approve($id)
    {
       $job = ApplicantForm::find($id);
       Onboard::create([
            'company' => $job->company,
            'name' => $job->name,
            'email' => $job->email,
            'location' => $job->location,
       ]);
       flash()->addSuccess('Data Approved Successfully');
    }
    public function approved($id)
    {
       $job = ApplicantForm::find($id);
       Onboard::create([
            'company' => $job->company,
            'name' => $job->name,
            'email' => $job->email,
            'location' => $job->location,
       ]);
       flash()->addSuccess('Data Approved Successfully');
    }
}
