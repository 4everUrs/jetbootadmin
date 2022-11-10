<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\AssetDelivery;
use App\Models\Buyer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Delivery extends Component
{
    public $requestForm;
    public $invoice_file, $order_id, $invoice_id;
    use WithFileUploads;
    public function render()
    {
        return view('livewire.logistics.assetmgmt.delivery', [
            'orders' => Buyer::where('status', 'confirmed')->get(),
            'requests' => AssetDelivery::all(),
        ]);
    }
    public function sendRequest()
    {
        $temp = Buyer::find($this->order_id);
        $file_name = $this->invoice_file->getClientOriginalName();
        $validatedData = $this->validate([
            'invoice_id' => 'required',
            'invoice_file' => 'required',
        ]);
        $validatedData['order_id'] = $temp->order_id;
        $validatedData['buyer_id'] = $temp->id;
        $validatedData['status'] = 'Pending';
        $validatedData['invoice_file'] = $this->invoice_file->storeAs('invoice', $file_name, 'do');
        AssetDelivery::create($validatedData);
        toastr()->addSuccess('Request Sent Successfully');
        $this->reset();
        $this->requestForm = false;
    }
}
