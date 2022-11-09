<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\ListRequested;
use App\Models\Transaction;


class Requestedlist extends Component
{

    public function render()
    {

        return view('livewire.finance.bm.requestedlist', [
            'list_requesteds' => ListRequested::all(),
        ]);
    }
}
