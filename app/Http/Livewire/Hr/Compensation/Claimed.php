<?php

namespace App\Http\Livewire\Hr\Compensation;

use App\Models\Claimed as ModelsClaimed;
use App\Models\Claiming;
use Livewire\Component;
use Livewire\WithPagination;

class Claimed extends Component
{
    use WithPagination;
    
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire..hr.compensation.claimed',[
            'datas' => Claiming::paginate(10),
        ]);
    }
}
