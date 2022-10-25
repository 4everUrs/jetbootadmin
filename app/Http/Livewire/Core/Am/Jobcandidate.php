<?php

namespace App\Http\Livewire\Core\Am;

use App\Models\ApplicantForm;
use Livewire\Component;
use App\Models\ApplicantList;
use App\Models\LocalPlacement;
use App\Models\Denied;

class Jobcandidate extends Component
{
    public function render()
    {
        return view('livewire.core.am.jobcandidate', [
            'jobs' => ApplicantList::all(),
        ]);
    }
    public function approve($id)
    {
        $applicant_id = ApplicantList::find($id);
        $job = ApplicantForm::find($applicant_id->id);

        if ($job->status == 'Approved') {
            flash()->addWarning('Data is already approved');
        } else {
            $job->status = 'Approved';
            LocalPlacement::create([
                'name' => $job->name,
                'phone' => $job->phone,
                'email' => $job->email,
                'company_name' => $job->company,
                'company_location' => $job->location,
                'position' => $job->position,

            ]);
            $job->save();
            flash()->addSuccess('Data approved successfully');
        }
    }
    public function denied($id)
    {
        $job = ApplicantList::find($id);

        Denied::create([
            'name' => $job->name,
            'position' => $job->position,
            'email' => $job->email,
            'phone' => $job->phone,
            'address' => $job->address,
            'resume_file' => $job->resume_file,
            'status' => $job->status = 'Denied',
        ]);
        flash()->addSuccess('Data Deleted Successfully');
        ApplicantList::find($id)->delete();
    }
}
