<?php

namespace App\Http\Controllers;

// use Hash;
use Illuminate\Http\Request;
use App\Models\InternalUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        $credentials = $request->only('username', 'password');



        $user = InternalUser::where('username', $credentials['username'])->first();


        if ($user && Hash::check($credentials['password'], $user->password)) {

            Auth::login($user);


            $request->session()->put('last_active', now());
            $request->session()->put('userdata', $user);






            return redirect()->route('home');
        }

        return back()->withErrors(['Invalid credentials']);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
