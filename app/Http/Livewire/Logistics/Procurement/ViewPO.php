<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PoItem;
use PDF;

class ViewPO extends Component
{
    public $po_id;
    public $supplier_id;
    public $subtotal;
    public $temp;
    protected $listeners = [
        'passId' => 'getId',
        'download' => 'download',
    ];
    public function getId($id)
    {
        $this->subtotal = null;
        $this->po_id = $id;
        $test = PurchaseOrder::find($id);
        $this->supplier_id = $test->supplier_id;
        $this->temp = PurchaseOrder::with('getItem')->find($id);
        foreach ($this->temp->getItem as $x) {
            $this->subtotal += $x->totalcost;
        }
        // dd($this->temp->getItem[0]->item);
    }

    public function render()
    {
        return view('livewire.logistics.procurement.view-p-o', [
            'items' => $this->temp,
            'supplier' => Supplier::find($this->supplier_id),
            'po' => PurchaseOrder::find($this->po_id),
        ]);
    }
}
