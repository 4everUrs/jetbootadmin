<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use App\Models\MroInventory;
use Livewire\Component;
use App\Models\RequestList;
use App\Models\ProcurementRequest;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Reorder;
use App\Models\RequestNotification;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\WarehouseSent;
use App\Notifications\RequestNotification as NotificationsRequestNotification;

use Illuminate\Support\Facades\Auth;
use Notification;

class Requestslist extends Component
{
    public $origin = 'Warehouse', $content, $status = 'Pending';
    public $requestModal = false;
    public $reOrderModal = false;
    public $dispatchModal = false;
    public $category, $quantity, $supplier, $item, $stock_id, $qty, $selected_id;
    public $item_name, $item_qty;
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if ($this->category == "Re-order") {
            $this->dispatchBrowserEvent('show-supplier');
        }
        return view('livewire.logistics.warehouse.requestslist', [
            'requests' => RequestList::orderBy('id', 'desc')->paginate(5),
            'suppliers' => Supplier::where('status', '!=', 'Terminated')->get(),
            'sents' => ProcurementRequest::where('origin', '=', $this->origin)
                ->orderBy('id', 'desc')->paginate(5),
            'items' => Stock::where('supplier_id', '=', $this->supplier)->where('status', '=', 'LOW')->get(),
            'inventories' => Stock::all(),
        ]);
    }
    public function saveRequest()
    {
        ProcurementRequest::create([
            'origin' => $this->origin,
            'type' => 'New',
            'item_name' => $this->item_name,
            'item_qty' => $this->item_qty,
            'requestor' => Auth::user()->name,
            'content' => $this->content,
            'status' => $this->status,
            'category' => 'Supplier'
        ]);
        RequestNotification::create([
            'user_id' => Auth::user()->id,
            'sender' =>  Auth::user()->currentTeam->name,
            'reciever' => 'Procurement',
            'department' => 'Logistics',
            'request_content' => 'Sent you a request',
            'routes' => 'requests'
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
        ]);
        Reorder::create([
            'supplier_id' => $this->supplier,
            'stock_id' => $temp->id,
            'quantity' => $this->quantity,
            'price' => $temp->cost_per_item,
            'description' => $this->content,
            'status' => $this->status
        ]);
        RequestNotification::create([
            'user_id' => Auth::user()->id,
            'sender' =>  Auth::user()->currentTeam->name,
            'reciever' => 'Procurement',
            'department' => 'Logistics',
            'request_content' => 'Sent you a request',
            'routes' => 'reorders'
        ]);
        ProcurementRequest::create([
            'origin' => $this->origin,
            'type' => 'Re-Order',
            'item_name' => $temp->name,
            'item_qty' => $this->quantity,
            'requestor' => Auth::user()->name,
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
        RequestNotification::create([
            'user_id' => Auth::user()->id,
            'sender' =>  Auth::user()->currentTeam->name,
            'department' => 'Logistics',
            'reciever' => 'MRO',
            'request_content' => 'Aprove your request',
            'routes' => 'requestlists'
        ]);
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
    public function test()
    {
    }
}
