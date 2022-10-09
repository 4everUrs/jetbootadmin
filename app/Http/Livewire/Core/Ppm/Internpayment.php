<?php

namespace App\Http\Livewire\Core\Ppm;

use Livewire\Component;
use App\Models\InternationalPayroll;
class Internpayment extends Component
{
    public $showInternPayroll = false;
    public $name,$attendance,$salary,$placement,$contribution,$collection;
    protected $rules = [
        'name' => 'required|string',
        'attendance' => 'required|string',
        'salary' => 'required|string',
        'contribution' => 'required|string',
        'placement' => 'required|string',
        'collection' => 'required|string'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.ppm.internpayment',[
            'payrolls' => internationalPayroll::all(),
        ]);
    }
    public function saveRequest(){
        $validateddata = $this->validate();
        InternationalPayroll::create($validateddata);
        $this->resetInput();
        $this->showInternPayroll = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->attendance = '';  
        $this->salary = '';  
        $this->contribution = '';  
        $this->placement = '';  
        $this->collection = '';  
    }
    public function loadInternPayroll(){
        $this->showInternPayroll = true;
    }
}
