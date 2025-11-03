<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            "email"=> 'required',
            "hashed_password"=>'required'
        ]);

        $credentials =  [
            'email' => $request->email,
            'password' => $request->hashed_password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error','Login details invalid');
    }

    function registrationPost(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=> 'required',
            'hashed_password'=> 'required'
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
        return redirect(route('login'));
    }
}
