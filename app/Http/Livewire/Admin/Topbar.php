<?php

namespace App\Http\Livewire\Admin;

use App\Models\RequestNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Topbar extends Component
{
    public function render()
    {

        return view('livewire.admin.topbar', [
            'notifications' => RequestNotification::where('reciever', '=', Auth::user()->currentTeam->name)
                ->orWhere('department', '=', Auth::user()->currentTeam->name)
                ->with('User')
                ->orderBy('id', 'desc')
                ->get(),
        ]);
        return view('livewire.admin.topbar');
    }
    public function mount()
    {
        // $date = User::with('Time')->find(Auth::user()->id);
        // dd($date);
    }
    public function test($id)
    {
        $temp =  RequestNotification::find($id);
        $temp->delete();
        return redirect()->route($temp->routes);
    }
}
