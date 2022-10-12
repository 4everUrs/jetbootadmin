<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Expenses;
use Livewire\WithPagination;

class Expensess extends Component
{
    public $eoriginated ,$ecategory ,$eamount,$eaccount,$edescription,$estatus='ongoing',$eexpense_id;
    public $grandexpenses;
    public $addExpense= false;
    public $updateExpenseItem= false;
    public $deleteItem= false;
    public $deleteExpense = false;
    
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
        $this->grandexpenses;
        return view('livewire.finance.bm.expensess',[
            'expenses'=>Expenses::orderBy('id','desc')->paginate(10),
        ]);
    }
    public function expensescreate()
    {
        
        $this->addexpense= true;
    }
    public function loadDeleteModal($id){
        $this->deleteExpense = true;
        $this->eexpense_id = $id;
    }

    public function sumExpenses()
    {
        $totals = Expenses::all();
        foreach($totals as $total){
        $this->grandexpenses += $total->eamount;

        }
    }

    public function addExpenses()
    {
        
        $data=$this->validate();
        Expenses::create($data);
        toastr()->addSuccess('Expenses Successfully Added');
        $this->resetInput();
        $this->addExpense= false;
    }

    public function deleteExpenseItems()
    {
       
        Expenses::find($this->eexpense_id)->destroy($this->eexpense_id);
        toastr()->addSuccess('Data deleted successfully');
        $this->resetInput();
        $this->deleteExpense= false;
    }
    public function delete($id)
    {
        $this->deleteRequest= true; //tigger to open delete modal
        $this->expense_id = $id; // setting transaction_id to id from selected item
    }
    public function updateExpenseItems($id)
    {
        $this->eexpense_id = $id;
       
        $this->updateExpenseItem= true;

        $expense = Expenses::find($id);
        
        $this->eoriginated = $expense->eoriginated;
        $this->ecategory = $expense->ecategory;
        $this->eamount = $expense->eamount;
        $this->eaccount = $expense->eaccount;
        $this->edescription = $expense->edescription;
    }

    public function mainUpdateFunction()
    {
        $validatedData = $this->validate(); //getting all validated input data from form
        Expenses::find($this->eexpense_id)->update($validatedData); // update database base on validateddata and insert into database with transaction_id
        $this->resetInput(); // clear all variables
        toastr()->addSuccess('Data update successfully'); // notification
        $this->updateExpenseItem = false; // trigger to close modal
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
