<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Auth;
use DB;
use DateTime;
class TestController extends Controller
{
    //
    public function viewTest()
    {
        if(Auth::guest())
        {
            return redirect()->route('/');
        }

        $data = Personal::all();
        return view('form.form',compact('data'));
    }
    // save
    public function viewTestSave(Request $request)
    {
        $request->validate([
            'username'=>'required|max:100',
            'email'   =>'required|email|unique:personals',
            'phone'   =>'required|min:11|numeric',
            'time'    =>'required',
            'from_date'    => 'required|date_format:d-m-Y',
            'to_date'      => 'required|date_format:d-m-Y',
            
            
            
        ]);
     
        try{

            $username = $request->username;
            $email    = $request->email;
            $phone    = $request->phone;
            $time     = $request->time;
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            
            $Personal = new Personal();
            $Personal->username = $username;
            $Personal->email    = $email;
            $Personal->phone    = $phone;
            $Personal->time     = $time;           
            $Personal->from_date     = $from_date;
            $Personal->to_date       = $to_date;
            $Personal->save();
            return redirect()->back()->with('insert','Data has been insert successfully!.');

        }catch(\Exception $e){

            return redirect()->back()->with('error','Data has been insert fail!.');
        }
    }
    // update
    public function update(Request $request)
    {
        $update =[

            'id'      =>$request->id,
            'username'=>$request->name,
            'email'   =>$request->email,
            'phone'   =>$request->phone,
        ];
        Personal::where('id',$request->id)->update($update);
        return redirect()->back()->with('insert','Data has been updated successfully!.');
    }

    // delete
    public function delete($id)
    {
        $delete = Personal::find($id);
        $delete->delete();
        return redirect()->back()->with('insert','Data has been deleted successfully!.');
    }
    
}
