<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\GenLed;
use App\Models\JournalEntry;
use Livewire\WithPagination;
use App\Models\SubJournal;

class Generalledgers extends Component
{
    public $dataGenled;
    public function render()
    {
        $this->dataGenled;
        return view('livewire.finance.bm.generalledgers',[
            'journal_entries'=>JournalEntry::orderBy('id','desc')->paginate(3), 
        ]);
    }

    public function ViewGeneralLed($id)
    {
        //--$this->ViewGenLed = true;
       // $this->dataGenled = JournalEntry::find($id);
       // $this->created_at = $this->data->created_at;
        
    }

    


    
}
