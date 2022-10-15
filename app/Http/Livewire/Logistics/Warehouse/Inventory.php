<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use Livewire\Component;
use App\Models\Stock;
use App\Models\Supplier;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $item_no, $description, $status = 'OK', $item_id, $remarks = "No";
    public $stock_value, $cost_per_item, $reorder_level, $stock_quantity, $name, $manufacturer, $supplier_id;
    public $addItem = false;
    public $deleteModal = false;
    public $updateModal = false;
    public $table = false;

    public function render()
    {
        return view('livewire.logistics.warehouse.inventory', [
            'items' => Stock::with('Supplier')->orderBy('id', 'desc')->paginate(3),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function saveItem()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'stock_quantity' => 'required|integer',
            'description' => 'required|string',
            'cost_per_item' => 'required|integer',
            'status' => 'required|string',
            'reorder_level' => 'required|integer',
            'remarks' => 'required|string'
        ]);
        $validatedData['supplier_id'] = $this->manufacturer;
        $validatedData['stock_value'] = $this->cost_per_item * $this->stock_quantity;
        $validatedData['remarks'] = $this->remarks;
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

    public function resetInput()
    {
        $this->code = null;
        $this->description = null;
        $this->quantity = null;
        $this->status = 'Pending';
        $this->item_id = null;
    }

    public function loadModal()
    {
        $this->addItem = true;
    }
}
