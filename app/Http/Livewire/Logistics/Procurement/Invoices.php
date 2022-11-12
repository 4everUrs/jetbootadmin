<?php

namespace App\Http\Livewire\Logistics\Procurement;


use App\Models\Invoice;
use App\Models\WhInvoice;
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
            'invoice_id' => $data->invoice_id,
            'company_name' => $data->company_name,
            'file_name' => $data->file_name,
            'status' => 'Recieved',
        ]);
        $data->status = 'Sent';
        $data->save();
        toastr()->addSuccess('Send Successfully');
    }
}
