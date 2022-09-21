<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use Livewire\Component;
use App\Models\Stock;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $code, $description, $quantity, $status = 'Continue' , $item_id;

    public $addItem = false;
    public $deleteModal = false;
    public $updateModal = false;

    protected $rules = [
        'code' => 'required|min:3',
        'description' => 'required|string',
        'quantity' => 'required|integer',
        'status' => 'required|string',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.logistics.warehouse.inventory',[
            'items' => Stock::orderBy('id','desc')->paginate(3),
        ]);
    }  

    public function saveItem(){
        $validatedData = $this->validate();
        Stock::create($validatedData);
        toastr()->addSuccess('Data added successfully');
        $this->resetInput();
        $this->addItem = false;
    }

    public function updateItem()
    {
        $validatedData = $this->validate();
        Stock::find($this->item_id)->update($validatedData);
        toastr()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->updateModal = false;
    }
    
    public function deleteModal()
    {
        
        Stock::find($this->item_id)->destroy($this->item_id);
         toastr()->addSuccess('Data deleted successfully');
        $this->resetInput();
        $this->deleteModal = false;
    }

    public function delete($id)
    {
        $this->item_id = $id;
        $this->deleteModal = true;
    }

    public function update($id)
    {
        $this->updateModal = true;
        $item = Stock::find($id);
        $this->item_id = $id;
        $this->code = $item->code;
        $this->description = $item->description;
        $this->quantity = $item->quantity;
        $this->status = $item->status;
    }

    public function resetInput(){
        $this->code = null;
        $this->description = null;
        $this->quantity = null;
        $this->status = 'Pending';
        $this->item_id = null;
        
    }

    public function loadModal(){
        $this->addItem = true;
    }
    
}
