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
            'jobs' => ApplicantList::where('status','=','Pending')->orWhere('status','=','Hired')->get(),
            
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
                'status' => 'Pending',
            ]);
            flash()->addSuccess('Data approved successfully');
        $job->status = 'Hired';
        $job->save();
    }
    public function denied($id)
    {
        ApplicantList::find($id)->update(['status'=>'Rejected']);
        flash()->addSuccess('Data Deleted Successfully');

    }
}
