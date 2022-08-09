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
         
             $receiverNumber = '+353 89 400 9867';
             $message = "Hi, Good day! Please Dont Forget to drink your Medicine";
             
       
          
                 $message = $client->message()->send([
                     'to'   =>  $receiverNumber,
                     'from' => 'Vonage APIs',
                     'text' => $message,
                     
                 ]);  
                
       
    
      
    
});


