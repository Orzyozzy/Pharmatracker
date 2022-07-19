<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Drugs;


class ReminderViewwController extends Controller {
   public function remind() {
      $users = DB::select('select * from leaves_admins');
      return view('userpage.remind',['users'=>$users]);


   }

   public function drugs(Request $request) {
   
     $users = DB::table('list_drugs')->paginate(5);
      return view('userpage.drugs',['drugs'=>$users]);
   }

      public function searchTest(Request $request){
         $users = DB::table('list_drugs')
         //->where('name' , '>=', '$name ')
        //     ->where('created_at', '<=', $todate)
          -> where('name', 'like', '%' .$request->input('query').'%')->paginate(5);
        

          if ($request->types){
            $users = DRUGS::where('type', 'like', '%' .$request->types. '%')->get();
          }else {
            return view('userpage.search',compact('users'));
          }
      
        
      }

      public function refresh(){
         return view('userpage.drugs');
      }

  
     
}

