<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;

class Joblist extends Component
{
    public $showModal = false;
    public function render()
    {
        return view('livewire.core.cm.joblist');
    }
    public function loadModal(){
        $this->showModal = true;
    }
}
