<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Listingreceivable;

class Listsofreceivables extends Component
{
    public function render()
    {
        return view('livewire.finance.bm.listsofreceivables',[
            'receivable' => Listingreceivable::all(),
        ]);
    
    

    }
}
