<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\InternalUser;
use App\Models\UserType;



class StaffRegistrationController extends Controller
{
    public function showForm()
    {
        // Fetch user types from the `usertypes` table
        $userTypes = UserType::all();
        return view('staff_registration', compact('userTypes'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:30|unique:internalusers',
            'password' => 'required|string|min:4|max:255',
            'fname' => 'required|string|max:30',
            'lname' => 'required|string|max:30',
            'usertype' => 'required|integer|exists:usertypes,usertype',
        ]);

        // Create a new user
        InternalUser::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'fname' => $request->fname,
            'lname' => $request->lname,
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('home')->with('success', 'User registered successfully');
    }


}
