<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\AssetDelivery;
use App\Models\Buyer;
use Livewire\Component;

class DeliveryList extends Component
{
    public function render()
    {
        return view('livewire.logistics.fleet.delivery-list', [
            'requests' => AssetDelivery::all(),
        ]);
    }
    public function approve($id)
    {
        $temp = AssetDelivery::find($id);
        Buyer::where('order_id', $temp->order_id)->update(['status' => 'preparing']);
        $temp->status = 'Approved';
        $temp->save();
        toastr()->addSuccess('Approve Successfully');
    }
}
