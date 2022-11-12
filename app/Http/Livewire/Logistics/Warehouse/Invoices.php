<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Invoices extends Component
{
    public function render()
    {
        return view('livewire.logistics.warehouse.invoices', [
            'invoices' => Invoice::all(),
        ]);
    }
    public function download($id)
    {
        $file_name = Invoice::find($id);
        return Storage::disk('do')->download($file_name->file_name);
    }
}
