<?php
use App\Jobs\ProcessPodcast;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Foundation\Console\ClosureCommand;




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
 



     
                
            foreach (User::all() as $data){
                // your code here.
                // You can access each item's data like: $data->id, $data->user etc.
            
                $job = (new ProcessPodcast($data->contactnumber))->onQueue('sms');
    

               
     
               
                $this->dispatch($job);
                echo $player->mobile;
                echo "<br/>";
            }
     
    
            
  ;
    
      
    
});


