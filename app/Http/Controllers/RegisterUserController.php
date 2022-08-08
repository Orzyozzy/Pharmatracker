<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Hash;

class RegisterUserController extends Controller
{
    public function saveRecord(Request $request, )
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contactnumber' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            Toastr::success('Create new Reminder successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Reminder fail :)','Error');
            return redirect()->back();
        }

       
      
    }
}
