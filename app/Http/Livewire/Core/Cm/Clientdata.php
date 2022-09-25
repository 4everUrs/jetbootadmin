<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;
use App\Models\Client;
class Clientdata extends Component
{
    public $showClient = false;
    public $name,$email,$location;
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
    public function saveclient(){
        $data = $this->validate();
        Client::create($data);
        $this->showClient = false;
    }
    public function loadClient(){
        $this->showClient = true;
}
}