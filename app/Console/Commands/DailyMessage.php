<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\LeavesAdmin;

class DailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SMS:Twice';

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
         
        
         
                
       $user = LeavesAdmin::all();
       foreach ($user as $all)
       {
        $message = "Hi, Good day! Please Dont Forget to drink your Medicine $all->medname , $all ->freqency";
        $message = $client->message()->send([
                   'to'   => ($all->contact_num),
                   'from' => 'Vonage APIs',
                   'text' => $message,
                  
               ]);
       }
      
    }
}
