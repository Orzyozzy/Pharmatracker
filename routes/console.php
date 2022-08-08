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

Artisan::command('SMS:Twice ', function (Request $request) {
    {
        $request->validate([
            'medname'   => 'required|string|max:255',
            'drugtype'   => 'required|string|max:255',
            'contact_num'  => 'required|string|max:255',
            'from_date'    => 'required|string|max:255',
            'to_date'      => 'required|string|max:255',
            'dosage'        => 'required|string|max:255',
            'freqency'   => 'required|string|max:255',           
        ]);

        $basic  = new \Vonage\Client\Credentials\Basic(getenv("VONAGE_KEY"), getenv("VONAGE_SECRET"));
        $client = new \Vonage\Client($basic);
    
        $receiverNumber = $request->contact_num;
        $message = $request->medname;
    
        $message = $client->message()->send([
            'to' => \Auth::user()->contactnumber,
            'from' => 'Vonage APIs',
            'text' => $message
        ]);
   

           

        DB::beginTransaction();
        try {

    
       
            

            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $contact_num = ['contact_num'=> 'required|numeric'];
            $day     = $from_date->diff($to_date);
            $days    = $day->d;

            $reminder = new LeavesAdmin;
            $reminder->medname       = $request->medname;
            $reminder->drugtype      = $request->drugtype;
            $reminder->contact_num   = $request->contact_num;
            $reminder->from_date     = $request->from_date;
            $reminder->to_date       = $request->to_date;
            $reminder->dosage       = $request->dosage;
            $reminder->freqency     = $request->freqency;
            $reminder->day           = $days;
   
            
            $reminder->save();
        
            DB::commit();
            
            Toastr::success('Create new Reminder successfully :)','Success');
           
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Reminder fail :)','Error');
            return redirect()->back();
        }
    }
});
    