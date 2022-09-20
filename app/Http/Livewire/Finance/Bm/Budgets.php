<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class Budgets extends Component
{
    public $originated,$category,$amount,$account,$description,$status='ongoing',$transaction_id;
    
    public $addBudget= false;
    public $updateItem= false;
    public $deleteItem= false;
    
    
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
        return view('livewire.finance.bm.budgets',[
            'transactions'=>Transaction::orderBy('id','desc')->paginate(5),   
        ]);

    }

    public function loadModal(){
        $this->addBudget= true;
       
        
    }

    public function addBudgets()
    {
        $this->addBudget= true;
        
        $data=$this->validate();
        Transaction::create($data);
        toastr()->addSuccess('Budget Request Successfully Added');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
   
    public function deleteItems()
    {
       
        Transaction::find($this->transaction_id)->destroy($this->transaction_id);
         toastr()->addSuccess('Data deleted successfully');
        $this->resetInput();
    }
    public function delete($id)
    {
        $this->transaction_id = $id;
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
