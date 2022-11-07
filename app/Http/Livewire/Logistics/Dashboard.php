<?php

namespace App\Http\Livewire\Logistics;

use App\Http\Livewire\Logistics\Warehouse\Inventory;
use App\Models\Asset;
use App\Models\Building;
use App\Models\Equipment;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Vehicle;
use Livewire\Component;

class Dashboard extends Component
{
    public $assetsCount, $vehicleCount, $inventoryCount, $supplierCount, $orderCount;
    public function render()
    {
        return view('livewire.logistics.dashboard', [
            'assets' => Asset::all(),
        ]);
    }
    public function mount()
    {
        $this->assetsCount += Building::count();
        $this->assetsCount += Vehicle::count();
        $this->assetsCount += Equipment::count();

        $this->vehicleCount = Vehicle::count();
        $this->inventoryCount = Stock::count();
        $this->supplierCount = Supplier::count();
        $this->orderCount = Order::count();
    }
}
