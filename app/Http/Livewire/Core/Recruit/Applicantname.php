<?php

namespace App\Http\Livewire\Core\Recruit;

use App\Models\ApplicantForm;
use App\Models\ApplicantList;
use Livewire\Component;


class Applicantname extends Component
{
    public $deleteModal = false;
    public $name,$position,$email,$phone,$address,$resume;
    public $search = '';
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
        $searchFields = '%' . $this->search . '%';
        return view('livewire.core.recruit.applicantname',[
            'jobs' => ApplicantForm::where('status','=','Screening')
            ->orWhere('status','=','Qualified')->get(),
            'notQualified' => ApplicantForm::where('status','=','Not Qualified')->get(),
        ]);
    }
    public function approve($id)
    {
       $job = ApplicantForm::find($id);
            ApplicantList::create([
                'name' => $job->name,
                'listing_id' => $job->listing_id,
                'position' => $job->position,
                'email' => $job->email,
                'phone' => $job->phone,
                'address' => $job->address,
                'resume_file' => $job->resume_file,
                'location' => $job->location,
                'company_name' => $job->company,   
                'status' => 'Pending',
            ]);
            $job->status = 'Qualified';
            $job->save();
            flash()->addSuccess('Data approved successfully');
    }
    public function disapprove($id)
    {
        ApplicantForm::find($id)->update(['status'=> 'Not Qualified']);
       flash()->addSuccess('Data Deleted Successfully');
    
    }
    public function deleteData()
    {
        ApplicantForm::find($this->name)->destroy($this->name);
        flash()->addSuccess('Data deleted successfully');
        $this->deleteModal = false;
    }
    public function deleteJob($id)
    {
        $this->name = $id;
        $this->deleteModal = true;
    }
}
