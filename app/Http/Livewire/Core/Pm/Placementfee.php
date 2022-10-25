<?php

namespace App\Http\Livewire\Core\Pm;

use App\Models\ApplicantForm;
use App\Models\ApplicantList;
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


        $data = LocalPlacement::find($id);
        $resume = ApplicantList::where('name','=',$data->name)->first();
        Onboard::create([
            'name' => $data->name,
            'phone' => $data->phone,
            'email' => $data->email,
            'company_name' => $data->company_name,
            'position' => $data->position,
            'listing_id' => $data->listing_id,
            'resume_file' => $resume->resume_file
        ]);
        $data->status = 'Deployed';
        $data->save();
        flash()->addSuccess('Data deployed successfully');
        
    }
}
