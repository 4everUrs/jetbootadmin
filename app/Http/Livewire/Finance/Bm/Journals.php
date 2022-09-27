<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\JournalEntry;
use Livewire\WithPagination;

class Journals extends Component
{
    
        
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.finance.bm.budgets',[
            'journal_entries'=>JournalEntry::orderBy('id','desc')->paginate(3),   
        ]);
    }
    

    
}
