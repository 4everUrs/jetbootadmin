<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

use Livewire\Component;
use App\Models\Bidder;
use App\Models\Recieved;
use App\Models\Post;
use App\Models\Supplier;

class Bidders extends Component
{
    public $bidders;
    public $bidderDetail;
    public $post_id;
    public $postDetail;
    public $selected_id;
    public $viewBidderDetails = false;
    public function render()
    {
        $this->bidders = Bidder::all();

        if (!empty($this->selected_id)) {
            $this->bidderDetail = Bidder::find($this->selected_id);
        }
        if (!empty($this->post_id)) {
            $this->postDetail = Recieved::with('getRequirements')->find($this->post_id);
        }
        return view('livewire.logistics.vendorportal.bidders');
    }

    public function loadModal($id)
    {
        $temp = Bidder::find($id);
        $this->post_id = $temp->post_id;

        $this->selected_id = $id;

        $this->viewBidderDetails = true;
    }
    public function awarding()
    {
        $temp = Bidder::find($this->selected_id);
        $post = Post::find($temp->post_id);
        $postType = $post->type;

        Bidder::find($this->selected_id)->update(['status' => 'Sent']);
        $this->viewBidderDetails = false;
    }
}
