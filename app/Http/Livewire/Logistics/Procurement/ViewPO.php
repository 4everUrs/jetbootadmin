<?php

namespace App\Http\Livewire\Logistics\Procurement;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PoItem;
use PDF;

class ViewPO extends Component
{
    public $po_id ;
    public $supplier_id;
    public $items,$po,$supplier;
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
        if(!empty($this->po_id)){
            $this->items = PurchaseOrder::findOrFail($this->po_id)->getItem;
            $this->po =PurchaseOrder::find($this->po_id);
        }
        if(!empty($this->supplier_id)){
            $this->supplier = Supplier::findorFail($this->supplier_id);
        }
        return view('livewire.logistics.procurement.view-p-o');
    }


}
