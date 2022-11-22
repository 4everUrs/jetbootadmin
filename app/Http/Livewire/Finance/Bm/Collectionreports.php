<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Collectedincome;

class Collectionreports extends Component
{
    public $grandcollection,$camount;
    
    public function render()
    {
        $this->collects = Collectedincome::all();
        $totals = Collectedincome::all();
        foreach($totals as $total){
        $this->grandcollection += $total->camount;
        }
        return view('livewire.finance.bm.collectionreports');
    }

}
