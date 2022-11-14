<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use App\Models\AuditReports;
use Livewire\Component;
use App\Models\Stock;
use App\Models\Supplier;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $item_no, $description, $status = 'OK', $item_id, $remarks = "No";
    public $stock_value, $cost_per_item, $reorder_level, $stock_quantity, $name, $manufacturer, $supplier_id;
    public $reorder_quantity, $reorder_days;
    public $addItem = false;
    public $deleteModal = false;
    public $restockModal = false;
    public $updateModal = false;
    public $table = false;
    public $selected_id, $qty, $add, $sub, $sendAudit;
    public $audit_file;
    public function render()
    {

        return view('livewire.logistics.warehouse.inventory', [
            'items' => Stock::with('Supplier')->orderBy('id', 'desc')->paginate(10),
            'suppliers' => Supplier::where('status', '!=', 'Terminated')->get(),
        ]);
    }
    public function mount()
    {
        $items = Stock::with('Supplier')->get();
        foreach ($items as $item) {
            if ($item->stock_quantity <= $item->reorder_level) {
                $item->status = 'LOW';
                $item->save();
            } elseif ($item->stock_quantity > $item->reorder_level) {
                $item->status = 'OK';
                $item->save();
            }
        }
    }

    public function exportExcel()
    {
        return redirect()->route('exportInventory');
    }
    public function update($id)
    {
        $this->selected_id = $id;
        $this->updateModal = true;
    }

    public function updateItem()
    {
        $temp = Stock::find($this->selected_id);
        if (!empty($this->add)) {
            $temp->stock_quantity += $this->add;
            $temp->save();
            toastr()->addSuccess('Update Successfully');
        } else {
            $temp->stock_quantity = $temp->stock_quantity - $this->sub;
            $temp->save();
            toastr()->addSuccess('Update Successfully');
        }
        $this->updateModal = false;
    }
    public function operation($operation)
    {
    }

    public function saveItem()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'stock_quantity' => 'required|integer',
            'description' => 'required|string',
            'cost_per_item' => 'required|integer',
            'status' => 'required|string',
            'reorder_level' => 'required|integer',
            'remarks' => 'required|string'
        ]);
        $validatedData['supplier_id'] = $this->manufacturer;
        $validatedData['stock_value'] = $this->cost_per_item * $this->stock_quantity;
        $validatedData['remarks'] = $this->remarks;
        $validatedData['reorder_quantity'] = $this->reorder_quantity;
        $validatedData['reorder_days'] = $this->reorder_days;
        Stock::create($validatedData);
        toastr()->addSuccess('Data added successfully');
        $this->resetInput();
        $this->addItem = false;
    }
    public function resetInput()
    {
        $this->code = null;
        $this->description = null;
        $this->quantity = null;
        $this->status = 'Pending';
        $this->item_id = null;
    }

    public function loadModal()
    {
        $this->addItem = true;
    }
    public function sendAuditReport()
    {
        $this->validate([
            'audit_file' => 'required'
        ]);
        $file_name = $this->audit_file->getClientOriginalName();
        AuditReports::create([
            'audit_file' => $this->audit_file->storeAs('audit_files', $file_name, 'do'),
            'origin' => 'Warehouse'
        ]);
        toastr()->addSuccess('Sent Successfully');
    }
}
