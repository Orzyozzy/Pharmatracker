<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Admin;
use DB;
use Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function saveAdmin(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'      => 'required|string|max:255',
            'password' => ['required', 'string', 'min:8', 'confirmed'],     
        ]);
        
        DB::beginTransaction();
        try {

            $added = new Admin;
            $added->name       = $request->name;
            $added->email       = $request->email;
            $added->password       = Hash::make($request->password);   
            $added->save();

            DB::commit();
            Toastr::success('Create new Pharmacist successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Pharmacist fail :)','Error');
            return redirect()->back();
        }
     
    }

    public function saveRecord(Request $request, )
    {
   

        $request->validate([
            'name'   => 'required|string|max:255',
            'age'   => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'contactnumber'    => 'required|string|max:255',
            'email'      => 'required|string|max:255',
            'password'        => 'required|string|max:255',       
        ]);

       

        DB::beginTransaction();
        try {
    
            $add = new User;
            $add->name       = $request->name;
            $add->age      = $request->age;
            $add->address   = $request->address;
            $add->contactnumber     = $request->contactnumber;
            $add->email       = $request->email;
            $add->password       = $request->password;       
            $reminder->save();
            
            DB::commit();
            Toastr::success('Create new user successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add user fail :)','Error');
            return redirect()->back();
        }

       
      
    }


    
}
