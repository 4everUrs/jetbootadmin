<?php

namespace App\Http\Livewire\Logistics\Procurement;


use App\Models\Invoice;
use App\Models\listingpayable;
use App\Models\WhInvoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Invoices extends Component
{
    public function render()
    {
        return view('livewire.logistics.procurement.invoices', [
            'invoices' => Invoice::orderBy('id', 'desc')->get(),
        ]);
    }
    public function sendInvoice($id)
    {
        $data = Invoice::find($id);
        WhInvoice::create([
            'procurement_invoice_id' => $data->id,
            'post_id' => $data->post_id,
            'bidder_id' => $data->bidder_id,
            'file_name' => $data->file_name,
            'status' => 'Recieved',
        ]);
        listingpayable::create([
            'lpname' => 'Logistics-Procurement',
            'lpattachment' => $data->file_name,
            'lpremarks' => 'N/A',
            'lpstatus' => 'Pending',
        ]);
        $data->status = 'Sent';
        $data->save();
        toastr()->addSuccess('Send Successfully');
    }
}
