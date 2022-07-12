<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function reminder()
    {

        $carousel1 = DB::table('contents')->where('category','carousel1')->first();
        $carousel2 = DB::table('contents')->where('category','carousel2')->first();
        $carousel3 = DB::table('contents')->where('category','carousel3')->first();
        $carousel4 = DB::table('contents')->where('category','carousel4')->first();
        $carousel5 = DB::table('contents')->where('category','carousel5')->first();
        $carousel6 = DB::table('contents')->where('category','carousel6')->first();
        
        return view('userpage.reminder');
    }
}
