<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Building;
use App\Models\Equipment;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Assetslist extends Component
{

    use WithPagination;
    public function render()
    {
        return view('livewire.logistics.assetmgmt.assetslist', [
            'users' => User::where('role_id', '!=', '3')
                ->orderBy('id', 'desc')->paginate(10),
            'buildings' => Building::orderBy('id', 'desc')->paginate(10),
            'vehicles' => Vehicle::orderBy('id', 'desc')->paginate(10),
            'equipments' => Equipment::orderBy('id', 'desc')->paginate(10),
            'suppliers' => Supplier::orderBy('id', 'desc')->paginate(10),
            'contractors' => Supplier::where('status', '=', 'contractor')
                ->orderBy('id', 'desc')->paginate(10),
        ]);
    }
}
