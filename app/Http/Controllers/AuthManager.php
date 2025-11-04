<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class AuthManager extends Controller
{
    function login(){

        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration(){

        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');

        
    }

   function loginPost(Request $request){
        $request->validate([
            "email"=> 'required|email',
            "hashed_password"=>'required'
        ]);

        $credentials =  [
            'email' => $request->email,
            'password' => $request->hashed_password
        ];

        if(Auth::attempt($credentials)){
            
            $user = Auth::user();

            if ($user->user_type == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->intended(route('home'));
            }
        }

        return redirect(route('login'))->with('error','Login details invalid');
    }

    function registrationPost(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email',
            'hashed_password' => 'required|confirmed'
        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['hashed_password'] = Hash::make($request->hashed_password);
        $user = User::create($data);

        
        if(!$user){
            return redirect(route('registration'))->with('error','Error with registering, please try again');
        }

        return redirect(route('login'))->with('success','Registration success, login to access your account');
    }


    function logout(){
        Session::flush();
        Auth::logout();
        
        return redirect(route('home'));
    }

    public function passwordRequest()
    {
        return view('forgot-password');
    }

    public function passwordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset(Request $request, $token)
    {
        return view('reset-password', [
            'request' => $request, 
            'token' => $token
        ]);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'hashed_password' => $request->password
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }
}