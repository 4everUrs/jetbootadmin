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
    public $preview = [];
    public $grandtotal;
    public $childData = [];
    public $addLiability= false;
    public $updateLiability= false;
    public $deleteLiability= false;
    public $deleteLiabilities= false;
   

     // wire:model for delete modal no declare so i declare.

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function mount(){

    
    //    $test = JournalEntry::find(3)->getChildData;
    //    dd($test);

    }
    public function render()
    {
        $this->preview;
        $this->grandtotal;
        $temp = JournalEntry::all();
 
        foreach($temp as $index => $temps)
        {
            $this->childData [] = JournalEntry::find($index+1)->getChildData;
           
        }
 
        $this->childData;
       
    //    dd($this->childData[0]);

        return view('livewire.finance.bm.journals',[
            'journal_entries'=>JournalEntry::orderBy('id','desc')->paginate(3), 
              
        ]);
    }

    public function loadingJournal(){
        $this->addLiability= true;
    }

    public function saveRecord()
    {
        $this->preview[] = [
            'jdescription' => $this->jdescription,
            'jdebit' => $this->jdebit,
            'jcredit' => $this->jcredit,
        ];
       $this->grandtotal += $this->jdebit + $this->jcredit;
       $this->resetLiability();
    }
    
    public function addLiabilities()
    {
    
        JournalEntry::create([
            'jencoded' => Auth::user()->name,
        ]);

        $temp = JournalEntry::latest('id')->first();
        foreach($this->preview as $index => $prev)
        {
            SubJournal::create([
                'jdescription' => $prev['jdescription'],
                'jdebit' => $prev['jdebit'],
                'jcredit' => $prev['jcredit'],
                'journal_entry_id' => $temp->id,
            ]);
        }
        toastr()->addSuccess('Record added successfully');
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
