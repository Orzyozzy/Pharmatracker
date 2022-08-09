<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TwiceMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SMS:Daily';

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
        $message = "Hi, Good day! Dont forget to drink your $request->medname, $request->freqency";
        
        $message = $client->message()->send([
            'to' =>  $receiverNumber,
            'from' => 'Vonage APIs',
            'text' => $message
        ]);

        DB::beginTransaction();
  
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
    }
}
