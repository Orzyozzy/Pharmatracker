<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:registers',
            'password'   => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $first_name = $request->first_name;
        $last_name  = $request->last_name;
        $email      = $request->email;
        $password   = $request->password;

        User::create([
            'first_name'=> $first_name,
            'last_name' => $last_name,
            'email'     => $email,
            'password'  => Hash::make($password),
        ]);

        return redirect('home/page');

    }
}
