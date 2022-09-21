<?php

namespace App\Http\Livewire\Logistics\Vendor;

use Livewire\Component;
use App\Models\Recieved;
use App\Models\Post;
class Recievedrequests extends Component
{
    

    public function render()
    {
        return view('livewire.logistics.vendor.recievedrequests', [
            'recieveds'=>Recieved::get(),
        ]);
        
    

}
}