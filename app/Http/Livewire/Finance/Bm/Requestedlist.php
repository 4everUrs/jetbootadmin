<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\ListRequested;
use App\Models\Transaction;
  

class Requestedlist extends Component
{
     public $list_requesteds;

    public function render()
    {
        $list_requesteds = ListRequested::all();
        return view('livewire.finance.bm.requestedlist');

    } 
}
