<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

class DailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SMS';

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
    public function handle(Request $request)
    {
        $basic  = new \Vonage\Client\Credentials\Basic(getenv("VONAGE_KEY"), getenv("VONAGE_SECRET"));
        $client = new \Vonage\Client($basic);
    
        $receiverNumber = $request->contact_num;
        $message = "hi" .$name.", This is testing from ItSolutionStuff.com";
    
        $message = $client->message()->send([
            'to' => \Auth::user()->contactnumber,
            'from' => 'Vonage APIs',
            'text' => $message
        ]);
   
      
    }
}
