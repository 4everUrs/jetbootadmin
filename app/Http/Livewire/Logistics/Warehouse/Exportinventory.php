<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use App\Models\Stock;
use Carbon\Carbon;
use Livewire\Component;
use PDF;

class Exportinventory extends Component
{
    protected $listeners = [
        'test' => 'export'
    ];
    public function render()
    {
        return view('livewire.logistics.warehouse.exportinventory');
    }
    public function export()
    {
        $dt = Carbon::parse(now())->format('m-d-Y');
        $data = [
            'items' => Stock::all(),
            'date' => Carbon::now(),
        ];
        $pdf = PDF::loadView('livewire.logistics.warehouse.exportinventory', $data)->setPaper('legal', 'landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            'audit-' . $dt . '.pdf'
        );
    }
}
