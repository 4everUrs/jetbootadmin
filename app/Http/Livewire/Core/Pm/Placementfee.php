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
    public $search = '';
    public $company_name,$company_location;
    public $selected_id;
    public function render()
    {
        $searchFields = '%' . $this->search . '%';
        return view('livewire.core.pm.placementfee',[
            'jobs' => LocalPlacement::where('name', 'like', $searchFields)->get(),
        ]);
    }
    public function savePlacement(){
        $validateddata = $this->validate([
            'company_name' => 'required|string',
            'company_location' => 'required|string',
        ]);
        $job = LocalPlacement::find($this->selected_id);
        $job->company_name = $validateddata['company_name'];
        $job->company_location = $validateddata['company_location'];
        $job->save();
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showPlacement = false;
    }
    public function resetInput()
    {
        $this->company_name = '';  
        $this->company_location = '';    
    }
    public function editPlacement($id)
    {
        $this->selected_id = $id;
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
