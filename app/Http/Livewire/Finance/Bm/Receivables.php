<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Collectedincome;

class Receivables extends Component
{
    public $cname,$caccountno,$cdescription,$cparticular,$creference,$cdatereceive,$cmodeofpayment,$camount;
    public $grandcollection;

    public function render()
    {
        $this->collects = Collectedincome::all();
        $totals = Collectedincome::all();
        foreach($totals as $total){
        $this->grandcollection += $total->camount;
        }
        return view('livewire.finance.bm.receivables');
    }
}
