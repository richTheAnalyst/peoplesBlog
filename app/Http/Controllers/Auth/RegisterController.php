<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => ['required', 'min:2', 'max:50'],
            'last_name' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'max:50', 'email', 'unique:users'], // Ensure the email is unique
            'phone' => ['required', 'min:10', 'max:15'],
            'password' => ['required', 'min:6', 'max:255']
        ]);
        

        // Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user
        $user = User::create($validatedData);

        // Log the user in
       // Auth::login($user);

        // Redirect to a desired route after registration
        return redirect()->route('login.create');
    }
}
