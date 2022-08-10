<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Reminder;


class sendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder(s) via SMS using Twilio.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $reminder = new Reminder();
        $reminder->sendReminders();
        $this->info('Success! Check your messages.');
    }   
}
