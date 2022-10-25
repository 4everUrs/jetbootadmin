<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Topbar extends Component
{
    public function render()
    {
        return view('livewire.admin.topbar', [
            'users' => User::with('Time')->find(Auth::user()->id),
        ]);
    }
    public function mount()
    {
        // $date = User::with('Time')->find(Auth::user()->id);
        // dd($date);
    }
}
