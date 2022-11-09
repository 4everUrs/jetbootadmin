<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\MroInventory;
use App\Models\RequestList;
use Livewire\Component;

class Rominventory extends Component
{
    public $requestItem = false;
    public $content;
    public function render()
    {
        return view('livewire.logistics.fleet.rominventory', [
            'requests' => RequestList::get(),
            'inventories' => MroInventory::all(),
        ]);
    }
    public function sendRequest()
    {
        RequestList::create([
            'origin' => 'MRO',
            'content' => $this->content,
            'status' => 'Pending'
        ]);
        toastr()->addSuccess('Request Sent');
        $this->requestItem = false;
        $this->reset();
    }
}
