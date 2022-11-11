<?php

namespace App\Http\Livewire\Core\Am;

use App\Mail\AcceptanceMail;
use App\Mail\FinalInterviewMail;
use App\Mail\RejectionMail;
use App\Models\ApplicantList;
use App\Models\Iinterview;
use App\Models\JobCandid;
use App\Models\Denied;
use Livewire\Component;
use Carbon\Carbon;
use Mail;

class Initial extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.core.am.initial',[
            'jobs' => Iinterview::where('status','=','Pending')
            ->orWhere('status','=','Qualified')->get(),
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
        Mail::to($job->email)->send(new FinalInterviewMail());
        $job->status = 'Qualified';
        $job->save();
        flash()->addSuccess('Data approved successfully');
    }
    public function denied($id)
    {
        $data = ApplicantList::find($id);
        
        Denied::create([
            'name' => $data->name,
            'position' => $data->position,
            'email' => $data->email,
            'phone' => $data->phone,
            'address' => $data->address,
            'resume_file' => $data->resume_file,
            'status' => 'Denied'
        ]);
        $applicantDetails =[
            'name' => $data->name,
            'address' => $data->address,
            'position' => $data->position,
            'company' => $data->company_name,
            'date' => Carbon::parse(now())->toFormattedDateString(),
        ];
        Mail::to($data->email)->send(new RejectionMail($applicantDetails));
        $data->status = 'Denied';
        $data->save();
        flash()->addSuccess('Data Deleted Successfully');

    }
}
