<?php

namespace App\Http\Livewire\Core\Am;

use App\Models\ApplicantList;
use App\Models\Iinterview;
use App\Models\JobCandid;
use Livewire\Component;

class Initial extends Component
{
    public function render()
    {
        return view('livewire.core.am.initial',[
            'jobs' => Iinterview::all(),
        ]);
    }
    public function approve($id)
    {
     
        $job = ApplicantList::find($id);
      
       JobCandid::create([
            'name' => $job->name,
            'position' => $job->position,
            'email' => $job->email,
            'phone' => $job->phone,
            'address' => $job->address,
            'resume_file' => $job->resume_file,
            'status' => 'Pending'
        ]);
        $job->status = 'Qualified';
        $job->save();
        flash()->addSuccess('Data approved successfully');
    }
}
