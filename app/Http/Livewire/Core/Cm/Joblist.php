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
        toastr()->addSuccess('New Job Created Successfully.');
        $this->resetInput();
        $this->showModal = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->position = '';  
        $this->salary = '';  
        $this->details = '';  
        $this->location = '';  
    }
    public function loadModal(){
        $this->showModal = true;
    }
}
