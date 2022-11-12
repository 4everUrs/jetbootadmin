<?php

namespace App\Http\Livewire\Core\Am;

use App\Mail\AcceptanceMail;
use App\Mail\RejectionMail;
use App\Models\ApplicantForm;
use Livewire\Component;
use App\Models\ApplicantList;
use App\Models\LocalPlacement;
use App\Models\Denied;
use App\Models\Iinterview;
use Carbon\Carbon;
use Mail;

class Jobcandidate extends Component
{
    public $viewLetter = false;
    public $time,$date,$venue,$person;
    public $search = '';
    public $selected_id;
    public function render()
    {
        return view('livewire.core.am.jobcandidate', [
            'jobs' => ApplicantList::all(),
            
        ]);
    }
    public function approved()
    {
        ApplicantList::find($this->selected_id)->update([
            'time' => Carbon::createFromFormat('H:i', $this->time)->format('g:i A'),
            'date' => Carbon::parse($this->date)->toFormattedDateString(),
            'venue' => $this->venue,
            'person' => $this->person,
        ]);
  
        
        flash()->addSuccess('Data approved successfully');
        $job = ApplicantList::find($this->selected_id);
        Iinterview::create([
            'name' => $job->name,
            'position' => $job->position,
            'email' => $job->email,
            'resume_file' => $job->resume_file,
            'time' => $job->time,
            'date' => $job->date,
            'venue' => $job->venue,
            'person' => $job->person,
            'status' => 'Pending',
        ]);
        $applicantDetails =[
            'name' => $job->name,
            'position' => $job->position,
            'company' => $job->company_name,
            'time' => $job->time,
            'date' => $job->date,
            'venue' => $job->venue,
            'person' => $job->person,
        ];
        Mail::to($job->email)->send(new AcceptanceMail($applicantDetails));
        $job->status = 'Scheduled';
        $job->save();
        $this->viewLetter = false;
    }
    public function approve($id){
        $this->selected_id = $id;
        $this->viewLetter = true;
    }
    public function denied($id)
    {
        $data = ApplicantList::find($id);
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
