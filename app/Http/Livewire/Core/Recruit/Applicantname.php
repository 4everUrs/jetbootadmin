<?php

namespace App\Http\Livewire\Core\Recruit;

use App\Models\ApplicantForm;
use Livewire\Component;


class Applicantname extends Component
{
    public $name,$position,$email,$phone,$location,$resume;
    protected $rules = [
        'name' => 'required|string|min:6',
        'position' => 'required|string',
        'email' => 'required|string',
        'phone' => 'required|string',
        'location' => 'required|string',
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
}
