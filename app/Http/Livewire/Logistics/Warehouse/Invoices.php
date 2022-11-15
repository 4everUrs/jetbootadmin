<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use App\Models\Invoice;
use App\Models\Listingpayable;
use App\Models\WhInvoice;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Invoices extends Component
{
    public $invoiceModal = false;
    public $selected_id, $invoice_no, $invoice_file;
    use WithFileUploads;
    public function render()
    {
        return view('livewire.logistics.warehouse.invoices', [
            'invoices' => WhInvoice::all(),
        ]);
    }
    public function download($id)
    {
        $temp = WhInvoice::find($id);
        Invoice::create([
            'supplier_id' => $temp->supplier_id,
            'wh_invoice_id' => $temp->id
        ]);
        Listingpayable::create([
            'lpname' => 'Logistics-Warehouse',
            'lpattachment' => $temp->file_name,
            'lpremarks' => 'N/A',
            'lpstatus' => 'Pending,'
        ]);
        $temp->status = 'Done';
        $temp->save();
        toastr()->addSuccess('Sent Successfully');
    }
    public function uploadInvoice($id)
    {
        $this->invoiceModal = true;
        $this->selected_id = $id;
    }
    public function upload()
    {
        $fileName = $this->invoice_file->getClientOriginalName();
        $temp = WhInvoice::find($this->selected_id);
        $temp->invoice_no = $this->invoice_no;
        $temp->invoice_file = $this->invoice_file->storeAs('invoices', $fileName, 'do');
        $temp->save();
        toastr()->addSuccess('Upload Successfully');
        $this->invoiceModal = false;
    }
}
