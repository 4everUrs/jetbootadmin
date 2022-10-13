<?php

namespace App\Http\Livewire\Core\Pm;

use App\Models\ApplicantForm;
use Livewire\Component;
use App\Models\LocalPlacement;
use App\Models\Onboard;
class Placementfee extends Component
{
    public function render()
    {
        return view('livewire.core.pm.placementfee',[
            'jobs' => LocalPlacement::all(),
        ]);
    }
    public function deploy($id){
        $job = ApplicantForm::find($id);
       
        Onboard::create([
            'name' => $job->name,
            'company_name' => $job->company,
            'position' => $job->position,
            'resume_file' => $job->resume_file,

        ]);
        flash()->addSuccess('Data Approved Successfully');
    }
}
