<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\ListingPayable;

class Listsofpayables extends Component
{

public $lpname,$lpattachment,$lpremarks,$lpstatus;


    public function render()
    {
        return view('livewire.finance.bm.listsofpayables',[
            'paid' => ListingPayable::all(),
        ]);
    
    
    }
}
