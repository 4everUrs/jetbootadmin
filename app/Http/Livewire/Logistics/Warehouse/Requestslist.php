<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use App\Models\MroInventory;
use Livewire\Component;
use App\Models\RequestList;
use App\Models\ProcurementRequest;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Reorder;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\WarehouseSent;

class Requestslist extends Component
{
    public $origin = 'Warehouse', $content, $status = 'Pending';
    public $requestModal = false;
    public $reOrderModal = false;
    public $dispatchModal = false;
    public $category, $quantity, $supplier, $item, $stock_id, $qty, $selected_id;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if ($this->category == "Re-order") {
            $this->dispatchBrowserEvent('show-supplier');
        }
        return view('livewire.logistics.warehouse.requestslist', [
            'requests' => RequestList::get(),
            'suppliers' => Supplier::all(),
            'sents' => WarehouseSent::all(),
            'items' => Stock::where('supplier_id', '=', $this->supplier)->where('status', '=', 'LOW')->get(),
            'inventories' => Stock::all(),
        ]);
    }

    public function saveRequest()
    {
        $this->validate(['content' => 'required|string|min:5']);
        ProcurementRequest::create([
            'origin' => $this->origin,
            'content' => $this->content,
            'status' => $this->status,
            'category' => 'Supplier'
        ]);
        WarehouseSent::create([
            'destination' => 'Procurement',
            'content' => $this->content,
            'status' => $this->status,
            'category' => 'Supplier'
        ]);
        toastr()->addSuccess('Request Sent Successfully');
        $this->requestModal = false;
        $this->reset();
    }
    public function saveReorder()
    {
        $temp = Stock::find($this->item);
        $this->validate([
            'item' => 'required',
            'supplier' => 'required',
            'quantity' => 'required',
            'content' => 'required',
        ]);
        Reorder::create([
            'supplier_id' => $this->supplier,
            'quantity' => $this->quantity,
            'price' => $temp->cost_per_item,
            'description' => $this->content,
            'status' => $this->status
        ]);
        WarehouseSent::create([
            'destination' => 'Procurement',
            'content' => $this->content,
            'status' => $this->status,
            'category' => 'Re-Order'
        ]);
        toastr()->addSuccess('Re-Order Sent Successfully');
        $this->reOrderModal = false;
        $this->reset();
    }
    public function confirm($id)
    {
        $temp = RequestList::find($id);
        $temp->status = 'Confirmed';
        $temp->save();
        toastr()->addSuccess('Operation Success');
    }
    public function dispatch($id)
    {
        $this->selected_id = $id;
        $this->dispatchModal = true;
    }
    public function sendDispatch()
    {
        $temp = Stock::find($this->stock_id);
        if ($temp->stock_quantity >= $this->qty) {
            MroInventory::create([
                'stock_id' => $this->stock_id,
                'item_name' => $temp->name,
                'description' => $temp->description,
                'quantity' => $this->qty,
                'unit_price' => $temp->cost_per_item,
                'inventory_value' => $this->qty * $temp->cost_per_item,
            ]);
            $x = RequestList::find($this->selected_id);
            $x->status = 'Dispatched';
            $x->save();
            $temp->stock_quantity = $temp->stock_quantity - $this->qty;
            $temp->save();
            toastr()->addSuccess('Operation Successfull');
        } else {
            toastr()->addWarning('Selected Item Out of Stock');
        }
        $this->dispatchModal = false;
        $this->reset();
    }
    public function resetInput()
    {
        $this->origin = null;
        $this->content = null;
        $this->item_name = null;
        $this->condition = null;
        $this->description = null;
        $this->amount = null;
        $this->file_name = null;
        $this->status = null;
    }
}
