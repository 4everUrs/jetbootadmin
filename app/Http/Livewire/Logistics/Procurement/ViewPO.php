<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PoItem;
use PDF;

class ViewPO extends Component
{
    public $po_id = '1';
    public $supplier_id ='1';
    protected $listeners =[
        'passId' => 'getId',
        'download'=>'download',
    ];
    public function getId($id)
    {
        $this->po_id = $id;
        $test = PurchaseOrder::find($id);
        $this->supplier_id = $test->supplier_id;
        
    }

    public function render()
    {

        return view('livewire.logistics.procurement.view-p-o',[
            'items' => PurchaseOrder::findOrFail($this->po_id)->getItem,
            'po' => PurchaseOrder::find($this->po_id),
            'supplier' => Supplier::findorFail($this->supplier_id),
        ]);
    }
    public function mount(){
        
    }
    public function download()
    {
        $data = [
            'items' => PurchaseOrder::findOrFail($this->po_id)->getItem,
            'po' => PurchaseOrder::find($this->po_id),
            'supplier' => Supplier::findorFail($this->supplier_id),
        ];
        $pdf = PDF::loadView('livewire.logistics.procurement.view-p-o',$data);
        return $pdf->download('purchase-order.pdf');
    }
}
