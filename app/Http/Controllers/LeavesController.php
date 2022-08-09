<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\LeavesAdmin;
use Artisan;
use DB;
use DateTime;

class LeavesController extends Controller
{


 

    // save record
    public function saveRecord(Request $request, Schedule $schedule)
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
        $message = "Hi, Thank you for adding reminder";
        
        $message = $client->message()->send([
            'to' =>  $receiverNumber,
            'from' => 'Vonage APIs',
            'text' => $message,
        
       
        ]);
    
        DB::beginTransaction();
          try{
    
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
        \Artisan::call('SMS:Twice');
    }  
    // edit record
    public function editRecordLeave(Request $request)
    {
        DB::beginTransaction();
        try {

            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $day     = $from_date->diff($to_date);
            $days    = $day->d;

            $update = [
                'id'           => $request->id,
                'medname'   => $request->medname,
                'drugtype'         => $request->drugtype,
                'contact_num'    => $request->contact_num,
                'from_date'    => $request->from_date,
                'to_date'      => $request->to_date,
                'dosage'    => $request->dosage,
                'freqency'    => $request->freqency,
                'day'          => $days,

                
            ];

            LeavesAdmin::where('id',$request->id)->update($update);
            DB::commit();
            
            DB::commit();
            Toastr::success('Updated Reminders successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Update Reminders fail :)','Error');
            return redirect()->back();
        }
    }

    // delete record
    public function deleteLeave(Request $request)
    {
        try {

            LeavesAdmin::destroy($request->id);
            Toastr::success('Leaves Reminder deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Leaves Reminder delete fail :)','Error');
            return redirect()->back();
        }
    }

}
