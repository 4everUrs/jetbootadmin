<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;

use App\Models\Client;
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
            $client->save();
            flash()->addSuccess('Data approved successfully');
       }
        
    }
    public function resetInput()
    {
        $this->client_id = '';
        $this->name = '';
        $this->email = '';
        $this->location = '';
        $this->status = '';
        $this->client_edit_id = '';
    }
    public function edit($id)
    {
        $client = Client::where('id',$id)->first();
        $this->client_edit_id = $client->id;
        $this->client_id = $client->client_id;
        $this->name = $client->name;
        $this->email = $client->email;
        $this->location = $client->location;
        $this->status = $client->status;
        
        $client->save();
        
        
    }
    public function editData()
    {
        $validatedData = $this->validate();
        
        Client::create($validatedData);
        $this->resetInput();
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