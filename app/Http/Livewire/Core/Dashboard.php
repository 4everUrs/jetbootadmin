<?php

namespace App\Http\Livewire\Core;

use Livewire\Component;
use App\Models\ApplicantForm;
use App\Models\Client;
use App\Models\LocalEmployee;
use App\Models\Job;

class Dashboard extends Component
{
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
        return view('livewire.core.dashboard');
    }
}
