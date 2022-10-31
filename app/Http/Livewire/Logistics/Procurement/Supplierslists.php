<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Models\Bidder;
use Livewire\Component;
use App\Models\Supplier;
use App\Models\User;
use App\Models\VendorPo;
use App\Notifications\SendPoNotification;
use Carbon\Carbon;
use Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Supplierslists extends Component
{
    use WithFileUploads;
    public $awardModal = false;
    public $poSend = false;
    public $invitationModal = false;
    public $selected_id, $file_name, $po_id, $time;
    public function render()
    {
        return view('livewire.logistics.procurement.supplierslists', [
            'active' => Supplier::where('status', '=', 'Active')->orderBy('id', 'desc')->get(),
            'terminated' => Supplier::where('status', '=', 'Terminated')->orderBy('id', 'desc')->get(),
            'applicants' => Bidder::with('Post')->where('status', '!=', 'Pending')->orderBy('id', 'desc')->get(),
        ]);
    }
    public function changeStatus($id)
    {
        Supplier::find($id)->update(['status' => 'Terminated']);
        toastr()->addSuccess('Operation Successfull');
    }
    public function activate($id)
    {
        Supplier::find($id)->update(['status' => 'Active']);
        toastr()->addSuccess('Operation Successfull');
    }
    public function award($id)
    {
        $this->selected_id = $id;
        $this->awardModal = true;
    }
    public function sendPO($id)
    {
        $this->selected_id = $id;
        $this->poSend = true;
    }
    public function send()
    {
        $fileName = $this->file_name->getClientOriginalName();

        $user = Supplier::find($this->selected_id);
        $file = $this->validate([
            'po_id' => 'required|integer',
            'file_name' => 'required',
        ]);
        $file['file_name'] = $this->file_name->storeAs('po_file', $fileName, 'do');
        $file['user_id'] = $user->user_id;
        VendorPo::create($file);







        $client = User::find($user->user_id);
        $url = 'https://mnlph.nyc3.digitaloceanspaces.com/' . $file['file_name'];
        $data = [
            'greeting' => 'Hi ' . $client->name . ',',
            'body' => 'You Recieved a new Purchase order',
            'thanks' => 'Thank you this is from techtrendzph.com',
            'actionText' => 'View Purchase Order',
            'actionURL' => url($url),
        ];
        Notification::send($client, new SendPoNotification($data));
        $this->poSend = false;
        toastr()->addSuccess('Operation Successfull');
    }
    public function awarding()
    {
        $supplier = Bidder::find($this->selected_id);
        $supplier->status = 'Awarded';
        $supplier->save();
        Supplier::create([
            'name' => $supplier->name,
            'email' => $supplier->email,
            'phone' => $supplier->phone,
            'address' => $supplier->address,
            'user_id' => $supplier->user_id,
            'status' => 'Active',
        ]);
        toastr()->addSuccess('Operation Successfull');
        $this->awardModal = false;
    }
    public function sendInvitation()
    {

        $this->invitationModal = true;
    }
    public function sendInvi($id)
    {
        $temp = Supplier::find($id);
        $dt = Carbon::createFromFormat('H:i', $this->time)->format('g:i A');
        $data = [
            'name' => $temp->name,
            'date' => $this->date,
            'time' => $this->time,

        ];
    }
}
