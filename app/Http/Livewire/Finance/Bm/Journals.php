<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\JournalEntry;
use App\Models\SubJournal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Journals extends Component
{
    public $jdescription, $jdebit, $jcredit, $jencoded, $journal_id = '1', $jsubdescription;
    public $preview = [];
    public $grandtotal;
    public $childData = [];
    public $addLiability = false;
    public $updateLiability = false;
    public $deleteLiability = false;
    public $deleteLiabilities = false;
    public $viewRecord = false;
    public $journal_entries;
    public $subjournalData;
    public $selected_id;
    public $subJournal;
    public $editSub_id;
    public $subjournals = 'd-none';
    // wire:model for delete modal no declare so i declare.

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {


        //    $test = JournalEntry::find(3)->getChildData;
        //    dd($test);

    }
    public function render()
    {
        if ($this->jdescription == 'Operating Budget') {
            $this->subjournals = null;
        }
        if (!empty($this->selected_id)) {
            $this->subjournalData = SubJournal::where('journal_entry_id', '=', $this->selected_id)->get();
        }

        $this->preview;
        $this->grandtotal;
        $this->journal_entries = JournalEntry::with('subjournal')->get();
        // dd($this->journal_entries->subjournal);
        return view('livewire.finance.bm.journals');
    }

    public function loadingJournal()
    {
        $this->addLiability = true;
    }
    public function viewModal($id)
    {
        $this->selected_id = $id;
        $this->viewRecord = true;
    }
    public function saveRecord()
    {
        $this->preview[] = [
            'jdescription' => $this->jdescription,
            'jdebit' => $this->jdebit,
            'jcredit' => $this->jcredit,
            'jsubdescription' => $this->jsubdescription,
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
        foreach ($this->preview as $index => $prev) {
            SubJournal::create([
                'jdescription' => $prev['jdescription'],
                'jsubdescription' => $prev['jsubdescription'],
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
        $temp = JournalEntry::find('id')->first();
        foreach ($this->$journal_entries as $entry) {
            SubJournal::get([
                'jdescription' => $entry['jdescription'],
                'jdebit' => $entry['jdebit'],
                'jcredit' => $entry['jcredit'],
                'journal_entries' => $temp->id,
            ]);
        }
        toastr()->addSuccess('Record deleted successfully');
        $this->resetLiability();
        $this->deleteliability = false;
    }
    public function delete($id)
    {
        //tigger to open delete modal
        $this->journal_entries = $id; // setting transaction_id to id from selected item
        $this->deleteliability = true;
    }

    public function updateLiability($id)
    {
        $this->selected_id = $id;
        $this->updateLiability = true;
        $this->subJournal = SubJournal::where('journal_entry_id', '=', $id)->get();
        $this->getGrandTotal();
    }

    public function updateLiabilities()
    {
        $validatedData = $this->validate();
        JournalEntry::find($this->$journal_id)->update($validatedData);
        $this->resetLiability();
        toastr()->updateLiability = false;
    }
    public function editSub($id)
    {

        $this->editSub_id = $id;
        $temp = SubJournal::where('id', '=', $id)->first();
        $this->jdescription = $temp->jdescription;
        $this->jdebit = $temp->jdebit;
        $this->jcredit = $temp->jcredit;
    }
    public function getGrandTotal()
    {
        $temp = SubJournal::where('journal_entry_id', '=', $this->selected_id)->get();
        foreach ($temp as $tmp) {
            $this->grandtotal += $tmp->jcredit + $tmp->jdebit;
        }
    }
    public function saveSub()
    {
        $temp = SubJournal::where('id', '=', $this->editSub_id)->first();
        $temp->jdescription = $this->jdescription;
        $temp->jdebit = $this->jdebit;
        $temp->jcredit = $this->jcredit;
        $temp->save();
        // $this->jdescription =null;
        // $this->jcredit =null;
        // $this->jdebit =null;
        $this->grandtotal = null;
        $this->getGrandTotal();
    }
    public function resetLiability()
    {
        $this->journal_id = null;
        $this->jdescription = null;
        $this->jcredit = null;
        $this->jdebit = null;
        $this->jencoded = 'ADMIN';
    }
}
