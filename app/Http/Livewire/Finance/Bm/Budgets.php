<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Expenses;
use App\Models\ListRequested;
use Livewire\WithPagination;

class Budgets extends Component
{
    public $originated,$category,$amount,$account,$description,$status='Ongoing',$transaction_id;
    public $grandtotals,$requests;
    public $addBudget= false;
    public $updateItem= false;
    public $deleteItem= false;
    public $deleteRequest = false; // wire:model for delete modal no declare so i declare.
   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'originated' => 'required|string',
        'category' => 'required|string',
        'amount' => 'required|integer',
        'account' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|string'
    ];
    
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()

    {
        $this->grandtotals;
        return view('livewire.finance.bm.budgets',[
            'transactions'=>Transaction::orderBy('id','desc')->paginate(10), 
             
        ]);

    }

    public function loadModalRequest(){
        $this->addBudget= true;
    }

    public function sumRecords()
    {
        $sum = Transaction::all();
        foreach($sum as $sums){
        $this->grandtotals += $sums-> amount;

        }
    }

    public function addBudgets()
    {
        // $this->addBudget= true; // no need na i declare dito to kasi tinatawag mo na sya sa loadModal
        $data=$this->validate();   
        Transaction::create($data);
        toastr()->addSuccess('Budget Request Successfully Added');
        $this->resetInput();
        // $this->dispatchBrowserEvent('close-modal'); no need na to kasi di naman nag wowork to.
        $this->addBudget = false; //ito trigger close ng modal after mag submit
    }
   
    public function deleteBudgetItem()
    {
        
        Transaction::find($this->transaction_id)->destroy($this->transaction_id);
        toastr()->addSuccess('Data deleted successfully');
        $this->resetInput();
        $this->deleteRequest= false;
    }
    public function delete($id)
    {
        
        //tigger to open delete modal
        $this->transaction_id = $id; // setting transaction_id to id from selected item
         $this->deleteRequest= true;
        
    }
    
    public function updateItems($id)
    {
        $this->updateItem= true;
        $transaction_id = Transaction::find($id);
        $this->transaction_id = $id;
        $this->originated =$transaction_id->originated;
        $this->category =$transaction_id->category;
        $this->amount =$transaction_id->amount;
        $this->account =$transaction_id->account;
        $this->description =$transaction_id->description;
        $this->status =$transaction_id->status;
    }

    public function mainUpdateFunction()
    {
        $validatedData = $this->validate(); //getting all validated input data from form
        Transaction::find($this->transaction_id)->update($validatedData); // update database base on validateddata and insert into database with transaction_id
        $this->resetInput(); // clear all variables
        toastr()->addSuccess('Data update successfully'); // notification
        $this->updateItem = false; // trigger to close modal
    }
   

    public function resetInput()
    {
        $this->transaction_id =null;
        $this->originated =null;
        $this->category =null;
        $this->amount =null;
        $this->account =null;
        $this->description =null;
        $this->status ='Ongoing';
        
    }
}
