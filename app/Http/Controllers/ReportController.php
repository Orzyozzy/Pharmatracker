<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Auth;
use DB;


class ReportController extends Controller
{
    // report
    public function report(Request $request)
    {
        if(Auth::guest())
        {
            return redirect()->route('/');
        }

        $fromdate = $request->fromdate;
        $todate   = $request->todate;
        $name     = $request->name;


        // $data = \DB::select("SELECT * FROM personals WHERE created_at BETWEEN '$fromdate 00:00:00'AND'$todate 23:59:59'");

        $data = DB::table('personals')
        //     >where('created_at' , '>=', '$fromdate ')
        //     ->where('created_at', '<=', $todate)
        //     ->where('username','like','%' .$name. '%')
            ->get();
        return view('report.report',compact('data'));
    }
}
