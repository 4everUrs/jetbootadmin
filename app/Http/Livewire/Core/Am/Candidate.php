<?php

namespace App\Http\Livewire\Core\Am;

use App\Models\ApplicantList;
use App\Models\Iinterview;
use Livewire\Component;
use App\Models\JobCandid;
use App\Models\LocalPlacement;

class Candidate extends Component
{
    public $deleteModal = false;
    public $search = '';
    public function render()
    {
        return view('livewire.core.am.candidate', [
            'jobs' => JobCandid::all(),
        ]);
    }
    public function approve($id)
    {
        $job = Iinterview::find($id)->ApplicantList;
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
        JobCandid::find($id)->update([
            'status' => 'Deployed'
        ]);
        flash()->addSuccess('Data approved successfully');
    }
    public function deleteData()
    {
        JobCandid::find($this->name)->destroy($this->name);
        flash()->addSuccess('Data deleted successfully');
        $this->deleteModal = false;
    }
    public function deleteJob($id)
    {
        $this->name = $id;
        $this->deleteModal = true;
    }
}
