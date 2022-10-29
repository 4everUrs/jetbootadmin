<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collect;

class Collections extends Component
{
    public $rfrom,$address,$cramount,$receiptno,$paytype,$cremarks;
    


    public function render()
    {
        $this->collects = Collect::all();
        return view('livewire.finance.bm.collections');
         
    }
    
}
