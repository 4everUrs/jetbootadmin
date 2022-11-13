<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomImapIdleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom_command';
    protected $account = "default";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
    public function onNewMessage(Message $message)
    {
        $this->info("New message received: " . $message->subject);
    }
}
