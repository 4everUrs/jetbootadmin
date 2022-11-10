<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Webklex\IMAP\Facades\Client;

class Mailbox extends Component
{
    public $inboxes;
    public function render()
    {
        return view('livewire.admin.mailbox');
    }
    public function mount()
    {
        $client = Client::account('default');
        $client->connect();

        $inbox = $client->getFolders();
        $this->inboxes = $inbox[4]->messages()->all()->get();
        $message = $inbox[4]->messages()->all()->get();
        // dd($message[0]->getdate());
    }
}
