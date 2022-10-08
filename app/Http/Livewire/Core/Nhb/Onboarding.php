<?php

namespace App\Http\Livewire\Core\Nhb;

use Livewire\Component;
use App\Models\Onboard;
use App\Models\LocalEmployee;
class Onboarding extends Component
{
    public function render()
    {
        return view('livewire.core.nhb.onboarding',[
            'jobs' => Onboard::all(),
        ]);
    }
    public function submit($id)
    {
       $job = Onboard::find($id);
       LocalEmployee::create([
            'name' => $job->name,
            'email' => $job->email,
            'document' => $job->document,
       ]);
       flash()->addSuccess('Data Submitted Successfully');
    }
}
