<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\PoItem;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;


class PurchaseItems extends Component
{
    
    public $po_id;
    public $supplier_id;
    public $request_id;
    public function render(Request $request)
    { 
        return view('livewire.logistics.procurement.purchase-items',[
            'items'=>PurchaseOrder::findorFail($request->id)->getItem,
            'po' => Supplier::findOrFail($this->supplier_id)->getPurchaseOrder->first(),
            'suppliers' => Supplier::find($this->supplier_id),
    ]);
    } 
    public function mount(Request $request){
        $supplier = PurchaseOrder::find($request->id);
        
        $this->po_id = $request->id;
        $this->supplier_id = $supplier->supplier_id;
        $this->request_id = $request->id;
        
        // $po = Supplier::find($this->supplier_id);
        // dd($po);
    }
    public function back(){
        $this->po_id = null;
         return redirect()->route('po'); 
    }
}
