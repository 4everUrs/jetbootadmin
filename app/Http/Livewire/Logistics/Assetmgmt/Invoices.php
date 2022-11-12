<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\AssetInvoice;
use App\Models\Buyer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Invoices extends Component
{
    public $createInvoice, $order_id, $invoiceModal;
    public $selected_id;
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
}
