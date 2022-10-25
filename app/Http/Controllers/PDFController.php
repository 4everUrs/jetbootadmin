<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PoItem;
use PDF;


class PDFController extends Controller
{
    public $purchaseOrderId, $supplier_id, $po_id;
    public $filename;

    public function __construct(Request $request)
    {
        $this->purchaseOrderId = $request->id;
        $supplier = PurchaseOrder::find($request->id);
        $this->supplier_id = $supplier->supplier_id;
        $this->po_id = $supplier->po_id;
    }
    public function getData()
    {
        return $data = [
            'items' => PurchaseOrder::findOrFail($this->purchaseOrderId)->getItem,
            'po' => PurchaseOrder::findOrFail($this->purchaseOrderId),
            'supplier' => Supplier::find($this->supplier_id),
        ];
    }
    public function index(Request $request)
    {
        $this->purchaseOrderId = $request->id;
        $supplier = PurchaseOrder::find($request->id);
        $this->supplier_id = $supplier->supplier_id;
        return view('livewire.logistics.procurement.po', $this->getData());
    }
    public function downloadPdf(Request $request)
    {

        $this->filename = 'po' . $this->po_id . '.pdf'; // setting up filename no need to copy this. make your own.

        // making variable for storing all data gathared from database;
        $data = [
            'items' => PurchaseOrder::findOrFail($this->purchaseOrderId)->getItem,
            'po' => PurchaseOrder::findOrFail($this->purchaseOrderId),
            'supplier' => Supplier::find($this->supplier_id),
        ];


        $pdf = PDF::loadView('livewire.logistics.procurement.po', $data); // storing the view file with data in $pdf
        return $pdf->download($this->filename); //downloading function of dompdf
    }
}
