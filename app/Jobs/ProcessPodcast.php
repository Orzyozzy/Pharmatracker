<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Route;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Console\ClosureCommand;
use App\Models\User;
use Auth;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;

    public function __construct()
    { 
        $this->user = $users;
      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $basic  = new \Vonage\Client\Credentials\Basic(getenv("VONAGE_KEY"), getenv("VONAGE_SECRET"));
        $client = new \Vonage\Client($basic);
    
        $receiverNumber = $request->contact_num;
   
        $message = "Hi, Good day! Please Dont Forget to drink your Medicine";
        
  
      
            $message = $client->message()->send([
                'to'   => $receiverNumber,
                'from' => 'Vonage APIs',
                'text' => $message,
               
            ]);  
    
    }
}
