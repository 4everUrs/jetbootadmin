<?php

namespace App\Http\Livewire\Core\Cm;

use App\Models\Client;
use Livewire\Component;
use App\Models\Job;
use App\Models\JobList as ModelsJobList;
use App\Models\Vacant;

class Joblist extends Component
{
    public $showModal = false;
    public $search = '';
    public $name,$position,$salary,$details,$location,$applicants;
   
    public function render()
    {
        $searchFields = '%' . $this->search . '%';
        return view('livewire.core.cm.joblist',[
            'clients' => Client::where('status','=','Active')->get(),
            'jobs' => ModelsJobList::where('name', 'like', $searchFields)->get(),
        ]);
    }
    public function saveRequest(){
      
        $collection = $this->salary * 0.20;
        $validateddata = $this->validate([
        'position' => 'required|string',
        'salary' => 'required|string',  
        'details' => 'required|string',  
        'applicants' => 'required|integer'
        ]);
        $data = Client::find($this->name);
        $validateddata['name'] = $data->name;
        $validateddata['daily_salary'] = round(($this->salary - $collection) / 26);
        $validateddata['collection'] = $collection;
        $validateddata['status'] = 'Pending';
        $validateddata['client_id'] = $data->id;
        $validateddata['location'] = $this->location;
        ModelsJobList::create($validateddata);
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
       
        ModelsJobList::find($id)->update(['status'=>'Open']);
        flash()->addSuccess('Data approved successfully');
       
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
