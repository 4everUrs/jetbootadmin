<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\ListRequested;
  

class Requestedlist extends Component
{
     public $list_requesteds;

    public function render()
    {
        $list_requesteds = ListRequested::all();
        return view('livewire.finance.bm.requestedlist');

    } 
}
