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
        try{
        \Artisan::call('SMS:Twice');
        Toastr::success('Create new Reminder successfully :)','Success');
           
        return redirect()->back();
    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('Add Reminder fail :)','Error');
        return redirect()->back();
    }
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
