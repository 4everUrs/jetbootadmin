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
    public $initialModal = false;
    public $search = '', $time, $date, $selected_id;
    public function render()
    {
        return view('livewire.core.am.initial',[
            'jobs' => Iinterview::where('status','=','Pending')
            ->orWhere('status','=','Qualified')->get(),
        ]);
    }
    public function approved()
    {
        ApplicantList::find($this->selected_id)->update([
            'time' => Carbon::createFromFormat('H:i', $this->time)->format('g:i A'),
            'date' => Carbon::parse($this->date)->toFormattedDateString(),
        ]);
  
        
        flash()->addSuccess('Data approved successfully');
        $job = ApplicantList::find($this->selected_id);
      
        JobCandid::create([
            'name' => $job->name,
            'position' => $job->position,
            'email' => $job->email,
            'phone' => $job->phone,
            'address' => $job->address,
            'resume_file' => $job->resume_file,
            'status' => 'Pending'
        ]);
        $applicantDetails =[
            'name' => $job->name,
            'position' => $job->position,
            'company' => $job->company_name,
            'time' => $job->time,
            'date' => $job->date,
        ];
        Mail::to($job->email)->send(new FinalInterviewMail($applicantDetails));
        $job->status = 'Qualified';
        $job->save();
        $this->initialModal = false;
    }
    public function approve($id)
    {
        $this->selected_id = $id;
        $this->initialModal = true;
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
