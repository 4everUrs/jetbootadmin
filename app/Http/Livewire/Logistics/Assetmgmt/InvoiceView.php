<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\AssetInvoice;
use App\Models\Buyer;
use Livewire\Component;
use PDF;

class InvoiceView extends Component
{
    public $orderDetails;
    public $orderItems;
    public $invoice;
    public $subtotal;
    public $tax, $grandtotal;
    protected $listeners = [
        'passID' => 'getId',
        'downloadInvoice' => 'download',
    ];
    public function render()
    {
        return view('livewire.logistics.assetmgmt.invoice-view');
    }
    public function download()
    {
        $data = [
            'orderDetails' => $this->orderDetails,
            'orderItems' => $this->orderItems,
            'invoice' => $this->invoice,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax,
            'grandtotal' => $this->grandtotal,
        ];
        $pdf = PDF::loadView('livewire.logistics.assetmgmt.invoice-view', $data)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "inv" . $this->invoice->id . '.pdf'
        );
    }
    public function getId($id, $invoiceID)
    {
        $this->subtotal = null;
        $this->tax = null;
        $this->grandtotal = null;
        $this->orderDetails = Buyer::find($id);
        $this->orderItems = $this->orderDetails->Order->OrderItem;
        $this->invoice = AssetInvoice::find($invoiceID);
        foreach ($this->orderItems as $item) {
            $this->subtotal += ($item->amount * $item->qty);
        }
        $this->tax = $this->subtotal * 0.12;
        $this->grandtotal = $this->subtotal + $this->tax;
    }
}
