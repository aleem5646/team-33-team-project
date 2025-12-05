<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Verified;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\Registered;
use App\Models\User2faCode; 
use App\Notifications\Send2faCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules\Password as PasswordRule;

class AuthManager extends Controller
{
    function login(){

        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('pages.auth.login');
    }

    function registration(){

        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('pages.auth.registration');

        
    }

   function loginPost(Request $request){
        $request->validate([
            "email"=> 'required|email',
            "hashed_password"=>'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->hashed_password
        ];

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            Auth::logout();

            $code = random_int(100000, 999999);
            User2faCode::create([
                'userId' => $user->userId,
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(10)
            ]);
            
            $user->notify(new Send2faCode($code));

            return Response::json([
                'status' => '2fa_required',
                'userId' => $user->userId
            ]);
        }

        return Response::json(['message' => 'Invalid login details'], 401);
    }

    function registrationPost(Request $request){
        $request->validate([
        'first_name' => 'required|string|alpha|max:255',
        'last_name'  => 'required|string|alpha|max:255',
        'email'      => 'required|string|email|max:255|unique:users,email',

        'hashed_password' => [
        'required',
        'confirmed',
        PasswordRule::min(6)->letters()->numbers()->symbols()]
        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['hashed_password'] = Hash::make($request->hashed_password);
        $user = User::create($data);

        if(!$user){
            return Response::json(['message' => 'Error with registration'], 500);
        }
        $code = random_int(100000, 999999);
        User2faCode::create([
            'userId' => $user->userId,
            'code' => $code,
            'expires_at' => Carbon::now()->addMinutes(10)
        ]);
        $user->notify(new Send2faCode($code));
        return Response::json([
            'status' => '2fa_required',
            'userId' => $user->userId
        ]);
    }

    function logout(){
        Session::flush();
        Auth::logout();
        
        return redirect(route('home'));
    }

    public function passwordRequest()
    {
        return view('pages.auth.forgot-password');
    }

    public function passwordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        Password::sendResetLink($request->only('email'));
        return back()->with('status', __('passwords.sent'));
    }

    public function passwordReset(Request $request, $token)
    {
        return view('pages.auth.reset-password', [
            'request' => $request, 
            'token' => $token
        ]);
    }

    public function passwordUpdate(Request $request)
    {
       $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'confirmed',
                PasswordRule::min(6)->letters()->numbers()->symbols()
            ],
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

    public function show2faForm()
    {
        if (!session()->has('2fa_user_id')) {
            return redirect(route('login'));
        }
        return view('pages.auth.2fa-verify');
    }

    public function verify2fa(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        if (!session()->has('2fa_user_id')) {
            return redirect(route('login'));
        }

        $userId = session('2fa_user_id');

        $findCode = User2faCode::where('userId', $userId)
                                ->where('code', $request->code)
                                ->where('expires_at', '>', Carbon::now())
                                ->first();

        if ($findCode) {
            $user = User::find($userId);
            Auth::login($user);

            session()->forget('2fa_user_id');
            User2faCode::where('userId', $userId)->delete();

            if ($user->user_type == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->intended(route('home'));
            }
        }

        return redirect(route('2fa.form'))->with('error', 'Invalid or expired 2FA code.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
            'userId' => 'required|numeric'
        ]);

        $findCode = User2faCode::where('userId', $request->userId)
                                ->where('code', $request->code)
                                ->where('expires_at', '>', Carbon::now())
                                ->first();

        if ($findCode) {
            $user = User::find($request->userId);

            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
                event(new Verified($user));
            }

            Auth::login($user);

            User2faCode::where('userId', $request->userId)->delete();

            $redirectUrl = ($user->user_type == 'admin') ? route('admin.dashboard') : route('home');
            
            return Response::json([
                'status' => 'success',
                'redirect' => $redirectUrl
            ]);
        }

        return Response::json(['message' => 'Invalid or expired code.'], 401);
    }

}