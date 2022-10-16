<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PoItem;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\TempItem;

class Purchaseorders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $poModal = false;
    public $poView = false;
    public $qty, $description, $cost, $totalCost = [], $supplier_id;
    public $purchase_id, $po_id;

    public $itemContainer = [];
    public $preview = [];
    public $subtotal;
    public $idk;

    protected $rules = [
        'itemContainer.*.qty' => 'required|integer',
        'itemContainer.*.item' => 'required|string',
        'itemContainer.*.cost' => 'required|integer',
    ];

    public function render()
    {
        $this->subtotal;
        return view('livewire.logistics.procurement.purchaseorders', [
            'puchase_orders' => PurchaseOrder::orderBy('id', 'desc')
                ->paginate(5),
            'suppliers' => Supplier::all(),
        ]);
    }
    public function addRow()
    {
        $this->itemContainer[] = ['qty', 'item', 'cost'];
    }
    public function removeRow($index)
    {

        unset($this->itemContainer[$index]);
    }

    public function mount()
    {

        // $this->itemContainer=[['qty','item','cost']];
    }


    public function showModal()
    {
        $this->poModal = true;
        $this->purchase_id = rand('10000', '20000');
    }

    public function total()
    {
        $this->subtotal = null;
        $this->preview = [];
        foreach ($this->itemContainer as $item) {
            $this->preview[] = ['qty' => $item['qty'], 'item' => $item['item'], 'cost' => $item['cost'], 'totalcost' => $this->totalCost[] = $item['qty'] * $item['cost']];
            $this->subtotal += $item['qty'] * $item['cost'];
        }
        $this->dispatchBrowserEvent('showButton');
    }

    public function insertItem()
    {
        $po_id = PurchaseOrder::latest('id')->first();
        foreach ($this->itemContainer as $index => $item) {
            PoItem::create([
                'qty' => $item['qty'],
                'item' => $item['item'],
                'cost' => $item['cost'],
                'totalcost' => $this->totalCost[$index],
                'purchase_order_id' => $po_id->id,
                'po_id' => $this->purchase_id,
            ]);
        }
    }
    public function createPO()
    {
        $name = Supplier::findOrFail($this->supplier_id);
        PurchaseOrder::create([
            'supplier_id' => $this->supplier_id,
            'supplier_name' => $name->name,
            'po_id' => $this->purchase_id,
        ]);
        $this->insertItem();
        $this->poModal = false;
        toastr()->addSuccess('Purchase order created successfully!');
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->qty = null;
        $this->description = null;
        $this->cost = null;
        $this->totalCost = null;
        $this->supplier_id = null;
        $this->purchase_id = null;
        $this->itemContainer = [];
        $this->subtotal = null;
    }

    public function showPoView($id)
    {

        $this->emit('passId', $id);
        $this->poView = true;
        $this->idk = $id;
        // $this->itemSelector= $id;
        // $supplier = PurchaseOrder::find($id);
        // $this->supplierSelector = $supplier->supplier_id;
        // $this->emit('test',$this->supplierSelector);

    }

    public function download($id)
    {

        return redirect()->route('download', ['id' => $this->idk]);
    }
}
