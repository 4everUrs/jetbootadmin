<?php

namespace App\Http\Livewire\Logistics\Warehouse;

use Livewire\Component;
use App\Models\RequestList;
use App\Models\ProcurementRequest;
use Livewire\WithPagination;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\Shop;
use App\Models\Image;
use App\Models\VendorShop;
use Illuminate\Support\Facades\Storage;

class Requestslist extends Component
{
    public $origin = 'Warehouse', $content, $status = 'Pending';
    public $destination;
    public $disposeModal = false;
    public $requestModal = false;
    public $images = [];
    public $fileCounter = [];
    public $displayImage;
    public $thumbnail;
    public $category;



    public $item_name, $condition, $description, $amount, $file_name;

    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['postAdded' => 'listing'];


    public function addRow()
    {
        $this->fileCounter[] = ['1'];
    }
    public function removeRow($index)
    {
        unset($this->fileCounter[$index]);
    }

    public function render()
    {
        $this->fileCounter;
        if ($this->category == "Re-Purchase") {
            $this->dispatchBrowserEvent('show-supplier');
        }
        return view('livewire.logistics.warehouse.requestslist', [
            'requests' => RequestList::get(),

        ]);
    }
    public function listing($selected_id)
    {
        dd('test');
    }

    public function saveRequest()
    {
        $this->validate(['content' => 'required|string|min:5']);
        ProcurementRequest::create([
            'origin' => $this->origin,
            'content' => $this->content,
            'status' => $this->status
        ]);
        toastr()->addSuccess('Request Success sent!.');
        $this->requestModal = false;
        $this->reset();
    }
    public function saveDisposal()
    {
        $validatedData = $this->validate([
            'item_name' => 'required|string',
            'condition' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'status' => 'required|string',
            'origin' => 'required|string',
            'thumbnail' => 'required|image'
        ]);
        $validatedData['thumbnail'] = $this->thumbnail->store('shop', 'do');
        Shop::create($validatedData);
        if (!empty($this->images)) {
            $this->saveImages();
        }
        toastr()->addSuccess('Request Success sent!.');
        $this->resetInput();
        $this->requestModal = false;
    }
    public function saveImages()
    {
        $temp = Shop::latest('id')->first();

        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max
        ]);
        foreach ($this->images as $image) {
            Image::create([
                'shop_id' => $temp->id,
                'vendor_shop_id' => $temp->id,
                'file_name' => $image->store('shop', 'do'),
            ]);
        }
    }

    public function resetInput()
    {
        $this->origin = null;
        $this->content = null;
        $this->item_name = null;
        $this->condition = null;
        $this->description = null;
        $this->amount = null;
        $this->file_name = null;
        $this->status = null;
    }
}
