<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;

use App\Models\Client;
use App\Models\Job;
class Clientdata extends Component
{
    public $showClient = false;
    public $name,$email,$location,$status,$client_edit_id;
    protected $rules = [
        'name' => 'required|string|min:6',
        'email' => ['required','email'],
        'location' => 'required|string'
        
        
        
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.cm.clientdata',[
            'clients' => Client::get(),

        ]);
    }
    
    public function saveData()
    {
        $validatedData = $this->validate();
        dd($validatedData);
        Client::create($validatedData);
        $this->resetInput();
    }
    public function approve($id)
    {
       $client = Client::find($id);

       
        if($client->status == 'Approved'){
            flash()->addWarning('Data is already approved');
        }
        else{
            $client->status = 'Approved';
            Job::create([
                'name' => $client->name,
                'location' => $client->location,
           ]);
            $client->save();
            flash()->addSuccess('Data approved successfully');
       }
        
    }
    
    public function delete($id)
    {
        $client = Client::where('id',$id)->first();
        if($client->showClient){
            flash()->addWarning('Data is already deleted');
        }
        else{
            $client->showClient;
            $client->delete();
            flash()->addSuccess('Data deleted successfully');
        }
        
    }
    public function saveclient(){
        $data = $this->validate();
        Client::create($data);
        $this->showClient = false;
    }
    public function loadClient(){
        $this->showClient = true;
    }
}