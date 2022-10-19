<?php

namespace App\Http\Livewire\Core\Pm;

use App\Models\ApplicantForm;
use Livewire\Component;
use App\Models\LocalPlacement;
use App\Models\Onboard;
class Placementfee extends Component
{
    public $showPlacement = false;
    public $name,$placement,$status;
    public function render()
    {
        return view('livewire.core.pm.placementfee',[
            'jobs' => LocalPlacement::all(),
        ]);
    }
    public function savePlacement(){
        $validateddata = $this->validate([
            'placement' => 'required|string',
            'status' => 'required|string',
        ]);
        $job = LocalPlacement::find($this->name);
        $job->placement = $validateddata['placement'];
        $job->status = $validateddata['status'];
        $job->save();
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showPlacement = false;
    }
    public function resetInput()
    {
        $this->name = '';  
        $this->placement = '';    
        $this->status = '';    
    }
    public function loadPlacement(){
        $this->showPlacement = true;
    }

    public function deploy($id){
        $job = ApplicantForm::find($id);
        
        if($job->status == 'Deployed'){
            flash()->addWarning('Data is already deployed');
        }
        else{
            $job->status = 'Deployed';
            Onboard::create([
                'name' => $job->name,
                'company_name' => $job->company,
                'position' => $job->position,
                'resume_file' => $job->resume_file,
                
            ]);
            $job->save();
            flash()->addSuccess('Data deployed successfully');
        }
    }
}
