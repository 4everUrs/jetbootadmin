<?php

namespace App\Http\Livewire\Core\Recruit;

use App\Models\ApplicantForm;
use App\Models\ApplicantList;
use Livewire\Component;


class Applicantname extends Component
{
    public $name,$position,$email,$phone,$address,$resume;
    protected $rules = [
        'name' => 'required|string|min:6',
        'position' => 'required|string',
        'email' => 'required|string',
        'phone' => 'required|string',
        'address' => 'required|string',
        'resume' => 'required|file',
           
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.recruit.applicantname',[
            'jobs' => ApplicantForm::all(),
        ]);
    }
    public function approve($name)
    {
       $job = ApplicantForm::find($name);

       if($job->status == 'Approved'){
            flash()->addWarning('Data is already approved');
       }
       else{
            $job->status = 'Approved';
            ApplicantList::create([
                'name' => $job->name,
                'position' => $job->position,
                'email' => $job->email,
                'phone' => $job->phone,
                'address' => $job->address,
                'resume_file' => $job->resume_file,
                'location' => $job->location,
            ]);
            $job->save();
            flash()->addSuccess('Data approved successfully');
       }
      
       
      
    }
    
}
