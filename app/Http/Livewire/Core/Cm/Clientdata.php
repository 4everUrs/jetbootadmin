<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;

use App\Models\Client;
use App\Models\Job;
class Clientdata extends Component
{
    public $showRenew = false;
    public $deleteModal = false;
    public $showClient = false;
    public $search = '';
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
        $searchFields = '%' . $this->search . '%';
        return view('livewire.core.cm.clientdata',[
            'clients' => Client::where('name', 'like', $searchFields)->get(),

        ]);
    }
    
    public function saveData()
    {
        $validatedData = $this->validate();
        dd($validatedData);
        Client::create($validatedData);
        $this->resetInput();
    }
    public function renew()
    {
        $this->showRenew = true;
    }
    public function deleteData(){
        Client::find($this->name)->destroy($this->name);
        flash()->addSuccess('Data deleted successfully');
        $this->deleteModal = false;
    }
    public function deleteClient()
    {
        $this->name = $this->name;
        $this->deleteModal = true;
    }
    
    public function saveclient(){
        $data = $this->validate();
        Client::create($data);
        flash()->addSuccess('Data added successfully');
        $this->showClient = false;
    }
    public function loadClient(){
        $this->showClient = true;
    }
}