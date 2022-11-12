<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\AssetDelivery;
use App\Models\Buyer;
use App\Models\RequestList;
use Livewire\Component;

class DeliveryList extends Component
{
    public $requestItem;
    public $content;
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
    public function sendRequest()
    {
        RequestList::create([
            'origin' => 'Fleet Management',
            'content' => $this->content,
            'status' => 'Pending'
        ]);
        toastr()->addSuccess('Request Sent');
        $this->requestItem = false;
        $this->reset();
    }
}
