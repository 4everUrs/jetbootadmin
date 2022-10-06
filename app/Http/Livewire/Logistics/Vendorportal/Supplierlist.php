<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

use Livewire\Component;

class Supplierlist extends Component
{
    public $testOnly = false;

    public $selection1;
    public $selection2 = [];
    public $set;

    public function render()
    {
        
        return view('livewire.logistics.vendorportal.supplierlist');
    }

    public function mount()
    {
      
    }
    public function showModal()
    {
        $this->testOnly = true;
    }
    public function saveTest()
    {
        dd($this->set[1][1]);
        dd($this->selection2[0][0][0]);
    }
}
