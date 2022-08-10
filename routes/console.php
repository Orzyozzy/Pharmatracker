<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\LeavesAdmin;




/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('SMS:Twice', function (Request $request) {
   

    $basic  = new \Vonage\Client\Credentials\Basic(getenv("VONAGE_KEY"), getenv("VONAGE_SECRET"));
    $client = new \Vonage\Client($basic);

    $user = LeavesAdmin::all();
    foreach ($user as $all)
    {
     $message = "Hi, Good day! Please Dont Forget to drink your $all->medname , $all->freqency";
     $message = $client->message()->send([
                'to'   => ($all->contact_num),
                'from' => 'Vonage APIs',
                'text' => $message,
               
            ]);

            $this->info('Reminder has been successfully added');
    }
   
       
    
      
    
});


