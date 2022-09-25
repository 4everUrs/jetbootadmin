<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;
use App\Models\Vacant;
class Joblist extends Component
{
    public $showModal = false;
    public $name,$position,$salary,$details,$location;
    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'position' => 'required|string',
            'salary' => 'required|string',
            'details' => 'required|string',
            'location' => 'required|string'
        
        ];
    }
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.cm.joblist');
    }
    public function saveRequest(){
        $validateddata=$this->validate();
        Vacant::create($validateddata);
        $this->showModal = false;
    }
    public function loadModal(){
        $this->showModal = true;
    }
}
