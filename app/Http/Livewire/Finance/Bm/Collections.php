<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collect;

class Collections extends Component
{
    public function render()
    {
        return view('livewire.finance.bm.collections');
    }
    
}
