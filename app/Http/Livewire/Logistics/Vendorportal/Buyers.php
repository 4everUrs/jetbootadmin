<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

use App\Models\Buyer;
use App\Models\Order;
use Livewire\Component;

class Buyers extends Component
{
    public $buyers;
    public $search = '';
    public $viewOrder = false;
    public $orders;
    public $selected_id;
    public $buyer_id;
    public $buyerDetail;
    public $status;
    public function render()
    {
        $this->buyers = Buyer::all();
        if (!empty($this->buyerDetail)) {
            $this->buyerDetail;
        };

        $this->orders = Order::with('OrderItem')->where('id', '=', $this->selected_id)->get();

        return view('livewire.logistics.vendorportal.buyers');
    }
    public function loadModal($order_id, $id)
    {
        $this->buyer_id = $id;
        $this->buyerDetail = Buyer::find($id)->first();
        $this->selected_id = $order_id;
        $this->viewOrder = true;
    }
    public function savePost()
    {
        $tmp = Buyer::find($this->buyer_id)->first();
        $tmp->status = $this->status;
        $tmp->save();
        $this->viewOrder = false;
    }
}
