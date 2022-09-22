<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Expenses;
use Livewire\WithPagination;

class Expensess extends Component
{
    public $eoriginated ,$ecategory ,$eamount,$eaccount,$edescription,$estatus='ongoing',$expense_id;
    
    public $addRequest= false;
    public $updateItem= false;
    public $deleteItem= false;
    public $deleteRequest = false;
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'eoriginated' => 'required|string',
        'ecategory' => 'required|string',
        'eamount' => 'required|integer',
        'eaccount' => 'required|string',
        'edescription' => 'required|string',
        'estatus' => 'required|string'
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.finance.bm.expensess',[
            'expenses'=>Expenses::orderBy('id','desc')->paginate(5),
        ]);
    }
    public function loadModalRequest()
    {
        $this->addExpense= true;
    }

    public function addExpenses()
    {
        
        $data=$this->validate();
        Expenses::create($data);
        toastr()->addSuccess('Expenses Successfully Added');
        $this->resetInput();
        $this->addExpense= true;
    }

    public function deleteItem()
    {
        Expenses::find($this->expense_id)->destroy($this->expense_id);
        toastr()->addSuccess('Data deleted successfully');
        $this->resetInput();
        $this->deleteRequest= false;
    }
    public function delete($id)
    {
        $this->deleteRequest= true; //tigger to open delete modal
        $this->expense_id = $id; // setting transaction_id to id from selected item
    }
    public function updateItems($id)
    {
        $this->updateItem= true;
        $expense_id = Expenses::find($id);
        $this->expense_id = $id;
        $this->originated =$expense_id->originated;
        $this->category =$expense_id->category;
        $this->amount =$expense_id->amount;
        $this->account =$expense_id->account;
        $this->description =$expense_id->description;
        $this->status =$expense_id->status;
    }

    public function mainUpdateFunction()
    {
        $validatedData = $this->validate(); //getting all validated input data from form
        Expenses::find($this->expense_id)->update($validatedData); // update database base on validateddata and insert into database with transaction_id
        $this->resetInput(); // clear all variables
        toastr()->addSuccess('Data update successfully'); // notification
        $this->updateItem = false; // trigger to close modal
    }
    public function resetInput()
    {
        $this->expense_id =null;
        $this->eoriginated = null;
        $this->ecategory = null;
        $this->eamount = null;
        $this->eaccount = null;
        $this->edescription = null;
        $this->estatus = 'Ongoing';
    }
}
