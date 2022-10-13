<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Assetslist extends Component
{

    use WithPagination;
    public function render()
    {


        return view('livewire.logistics.assetmgmt.assetslist', [
            'users' => User::where('role_id', '!=', '3')->get(),
        ]);
    }
}
