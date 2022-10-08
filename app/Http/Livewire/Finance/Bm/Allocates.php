<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Collect;
use Livewire\WithPagination;

class Allocates extends Component
{
    public function render()
    {
        return view('livewire.finance.bm.allocates');
    }
}
