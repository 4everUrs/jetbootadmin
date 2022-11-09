<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Livewire\Component;

class PurchaseOrders extends Component
{
    public $poModal = false;
    public $poView = false;
    public function render()
    {
        return view('livewire.logistics.warehouse.purchase-orders', [
            'puchase_orders' => PurchaseOrder::orderBy('id', 'desc')
                ->paginate(5),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function download($id)
    {
        return redirect()->route('download', ['id' => $id]);
    }
}
