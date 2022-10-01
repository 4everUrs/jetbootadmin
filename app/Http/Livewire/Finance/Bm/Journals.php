<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\JournalEntry;
use App\Models\SubJournal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Journals extends Component
{
    public $jdescription,$jdebit,$jcredit,$jencoded,$journal_id ='1';
    
    
    public $addLiability= false;
    public $updateLiability= false;
    public $deleteLiability= false;
    public $deleteLiabilities= false;

     // wire:model for delete modal no declare so i declare.

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount(){
        $this->jencoded = Auth::user()->name;
    }
    public function render()
    {
      
        return view('livewire.finance.bm.journals',[
            'journal_entries'=>SubJournal::orderBy('id','desc')->paginate(3),   
        ]);
    }

    public function loadingJournal(){
        $this->addLiability= true;
    }

    

    public function addLiabilities()
    {
        $data=$this->validate([
            'jdescription' => 'required|string',
            'jdebit'    => 'required|integer',
            'jcredit'   => 'required|integer',
            'jencoded'  => 'required|string',
            'journal_id'    => 'required|integer'
        ]);
        SubJournal::create($data);
        toastr()->addSuccess('Liabilities Successfully Added');
        $this->addLiability = false; 
        $this->resetLiability();
    }

    public function deleteliabilities()
    {
        
        JournalEntry::find($this->journal_id)->destroy($this->journal_id);
        toastr()->addSuccess('Record deleted successfully');
        $this->resetInput();
        $this->deleteLiability= false;
    }
    public function delete($id)
    {
        
        //tigger to open delete modal
        $this->journal_id = $id; // setting transaction_id to id from selected item
         $this->deleteLiability= true;
        
    }

    public function updateLiability($id){
        $this->updateLiability=true;
        $journal_id = $id;
        $this->journal_id = $id;
        $this->jdescription =$journal_id->jdescription;
        $this->jcredit =$journal_id->jcredit;
        $this->jdebit =$journal_id->jdedit;
        $this->jencoded =$journal_id->jencoded;
    }

    public function updateLiabilities(){
        $validatedData = $this->validate(); 
        JournalEntry::find($this->$journal_id)->update($validatedData);
        $this->resetLiability();
        toastr()->updateLiability=false;
    }

    
    public function resetLiability(){
        $this->journal_id =null;
        $this->jdescription =null;
        $this->jcredit =null;
        $this->jdebit =null;
        $this->jencoded = 'ADMIN';
    }


    
}
