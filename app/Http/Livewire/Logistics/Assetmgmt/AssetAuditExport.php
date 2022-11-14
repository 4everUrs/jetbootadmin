<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Building;
use App\Models\Equipment;
use App\Models\Vehicle;
use Carbon\Carbon;
use Livewire\Component;
use PDF;

class AssetAuditExport extends Component
{
    public function render()
    {
        return view('livewire.logistics.assetmgmt.asset-audit-export');
    }
    public function export()
    {
        $dt = Carbon::parse(now())->format('m-d-Y');
        $data = [
            'buildings' => Building::all(),
            'vehicles' => Vehicle::all(),
            'equipments' => Equipment::all(),
            'date' => Carbon::parse(now())->toFormattedDateString(),
        ];
        $pdf = PDF::loadView('livewire.logistics.assetmgmt.asset-audit-export', $data)->setPaper('legal', 'landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            'asset-audit' . $dt . '.pdf'
        );
    }
}
