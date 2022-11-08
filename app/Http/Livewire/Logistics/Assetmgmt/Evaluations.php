<?php

namespace App\Http\Livewire\Logistics\Assetmgmt;

use App\Models\Image;
use App\Models\Shop;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Evaluations extends Component
{
    public $origin = 'Asset Management', $content, $status = 'Pending';
    public $destination;
    public $disposeModal = false;
    public $requestModal = false;
    public $images = [];
    public $fileCounter = [];
    public $displayImage;
    public $thumbnail;
    public $category;
    public $item_name, $condition, $description, $amount, $file_name, $qty;
    use WithPagination;
    use WithFileUploads;
    public function render()
    {
        return view('livewire.logistics.assetmgmt.evaluations', [
            'items' => Shop::orderBy('id', 'desc')->withTrashed()->paginate(10),
        ]);
    }

    public function addRow()
    {
        $this->fileCounter[] = ['1'];
    }
    public function removeRow($index)
    {
        unset($this->fileCounter[$index]);
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
        $validatedData['quantity'] = $this->qty;
        $validatedData['thumbnail'] = $this->thumbnail->store('shop', 'do');
        Shop::create($validatedData);
        if (!empty($this->images)) {
            $this->saveImages();
        }
        toastr()->addSuccess('Request Success sent!.');
        $this->reset();
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
}
