<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;
use App\Models\Job;
use App\Models\Vacant;

class Joblist extends Component
{
    public $showModal = false;
    public $name,$position,$salary,$details,$location;
   
    public function render()
    {
        return view('livewire.core.cm.joblist',[
            'clients' => Job::all(),
        ]);
    }
    public function saveRequest(){
        $validateddata = $this->validate([
        'position' => 'required|string',
        'salary' => 'required|string',  
        'details' => 'required|string',  
        ]);
        $client = Job::find($this->name);
        $client->position = $validateddata['position'];
        $client->salary = $validateddata['salary'];
        $client->details = $validateddata['details'];
        $client->save();
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showModal = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->position = '';  
        $this->salary = '';  
        $this->details = '';   
    }
    public function loadModal(){
        $this->showModal = true;
    }
    public function approve($id){
        $onboard = Job::find($id);
        Vacant::create([
            'name' => $onboard->name,
            'position' => $onboard->position,
            'salary' => $onboard->salary,
            'details' => $onboard->details,
            'location' => $onboard->location,
        ]);
        flash()->addSuccess('Data Send Successfully');
    }
    public function delete($id)
    {
        $client = Job::where('id',$id)->first();
        if($client->showModal){
            flash()->addWarning('Data is already deleted');
        }
        else{
            $client->showModal;
            $client->delete();
            flash()->addSuccess('Data deleted successfully');
        }
        
    }
}
