<?php

namespace App\Http\Livewire\Core\Recruit;

use Livewire\Component;
use App\Models\Client;
class Addclient extends Component
{
    public $showClient = false;
    public $name,$email,$location,$status="Ongoing";
    protected $rules = [
        'name' => 'required|string|',
        'email' => ['required','email'],
        'location' => 'required|string',
        'status' => 'required|string'
        
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.recruit.addclient',[
            'clients' => Client::get(),
        ]);
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
