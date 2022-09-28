<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\JournalEntry;
use Livewire\WithPagination;

class Journals extends Component
{
    public $jdescription,$jdebit,$jcredit,$jencoded ='admin',$journal_id;
    
    public $addJournal= false;
    public $updateItem= false;
    public $deleteItem= false;
    public $deleteRequest = false; // wire:model for delete modal no declare so i declare.

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'jdescription' => 'required|string',
        'jdebit' => 'required|integer',
        'jcredit' => 'required|integer',
        'jencoded' => 'required|string',
       
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.finance.bm.journals',[
            'journal_entries'=>JournalEntry::orderBy('id','desc')->paginate(3),   
        ]);
    }

    public function loadModalJournal(){
        $this->addJournal= true;
    }

    

    


    

    
}
