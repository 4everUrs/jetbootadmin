<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\AssetInvoice;
use App\Models\Buyer;
use App\Models\listingpayable;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Invoices extends Component
{
    public $createInvoice, $order_id, $invoiceModal, $sendInvoice;
    public $selected_id, $invoice_file;
    use WithFileUploads;
    public function render()
    {
        return view('livewire.logistics.assetmgmt.invoices', [
            'orders' => Buyer::where('status', 'confirmed')->get(),
            'invoices' => AssetInvoice::orderBy('id', 'desc')->get(),
        ]);
    }
    public function create()
    {
        $temp = Buyer::find($this->order_id);

        AssetInvoice::create([
            'buyer_id' => $this->order_id,
            'order_id' => $temp->order_id,
            'user_id' => $temp->user_id,
            'creator' => Auth::user()->name,
        ]);
        toastr()->addSuccess('Invoice Created!');
        $this->createInvoice = false;
    }
    public function loadModal($id, $invoiceID)
    {

        $this->invoiceModal = true;
        $this->selected_id = $id;
        $this->emit('passID', $id, $invoiceID);
    }
    public function download()
    {
        $this->emit('downloadInvoice');
    }
    public function sendInvoice()
    {
        $filename = $this->invoice_file->getClientOriginalName();
        $this->validate([
            'invoice_file' => 'required|mimes:docx,pdf'
        ]);
        listingpayable::create([
            'lpname' => 'Logistics-Procurement',
            'lpattachment' => $this->invoice_file->storeAs('invoice', $filename, 'do'),
            'lpremarks' => 'N/A',
            'lpstatus' => 'Pending',
        ]);
        $this->sendInvoice = false;
        toastr()->addSuccess('Invoice Sent');
    }
}
