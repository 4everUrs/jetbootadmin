<?php

namespace App\Http\Livewire\Core\Rap;

use Livewire\Component;
use App\Models\ApplicantForm;
use App\Models\Client;
use App\Models\LocalEmployee;
use App\Models\Job;

class Applicantreport extends Component
{
    public $applicants;
    public function render()
    {
        $temp = ApplicantForm::all();
        $this->applicants = count($temp);

        $temp = Client::all();
        $this->clients = count($temp);

        $temp = Job::all();
        $this->jobs = count($temp);

        $temp = LocalEmployee::all();
        $this->localemployees = count($temp);
        return view('livewire.core.rap.applicantreport');
    }
}
