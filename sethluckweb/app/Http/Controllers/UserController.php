<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register_user(Request $request)
    {
        // return $request;
        $request->validate([
            'username' => 'required|string|min:5|max:12|unique:patients',
            'password' => 'required|string|min:5',
            'nic' => 'required|string|size:12|regex:/^[0-9]{12}$/',
            'dob' => 'required|date|before:today',
            'phonenumber' => 'required|string|size:10|regex:/^[0-9]{10}$/',
        ]);


        $patient = Patient::where('nicnumber', $request->nic)->first();

        if ($patient) {
            $patient->username = $request->username;
            $patient->password = Hash::make($request->password);
            $patient->dob = $request->dob;
            $patient->phonenumber = $request->phonenumber;
            $patient->save();
        } else {
            $patient = Patient::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'nicnumber' => $request->nic,
                'dob' => $request->dob,
                'phonenumber' => $request->phonenumber,
            ]);
        }

        return redirect()->route('home');

    }

    public function login_user(Request $request)
    {

        $request->validate([
            'username' => 'required|string|min:3|max:12',
            'password' => 'required|string|min:3|max:12'
        ]);


        $credentials = $request->only('username', 'password');



        $user = Patient::where('username', $credentials['username'])->first();


        if ($user && Hash::check($credentials['password'], $user->password)) {

            Auth::login($user);


            $request->session()->put('last_active', now());
            $request->session()->put('userdata', $user);






            return redirect()->route('loginhome');
        }

        return back()->withErrors(['Invalid credentials']);
    }


    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return redirect()->route('home'); // Redirect to home page

    }


}
