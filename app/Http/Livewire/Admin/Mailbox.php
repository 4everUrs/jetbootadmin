<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Webklex\IMAP\Facades\Client;

class Mailbox extends Component
{
    public function render()
    {
        return view('livewire.admin.mailbox');
    }
}
