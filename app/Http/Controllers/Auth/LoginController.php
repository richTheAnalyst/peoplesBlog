<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ensure the User model is imported

class LoginController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        Log::info('Login attempt', ['email' => $request->email]);

        // Validate the incoming request
        $request->validate([
            'email' => ['required', 'max:50', 'email'],
            'password' => ['required']
        ]);

        // Log out any authenticated user
        if (Auth::check()) {
            Auth::logout();
        }

        // Fetch the user by email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            Log::info('User found', ['user_id' => $user->id]);

            // Check if the password is correct
            if (Hash::check($request->password, $user->password)) {
                Log::info('Password matched for user', ['user_id' => $user->id]);
                Auth::login($user);
                return redirect()->route('posts.create'); // Ensure this route exists
            } else {
                Log::warning('Password mismatch for user', ['user_id' => $user->id]);
                return back()->withErrors(['password' => 'Sorry, this password is incorrect.'])->onlyInput('email');
            }
        } else {
            Log::warning('User not found', ['email' => $request->email]);
            return back()->withErrors(['email' => 'Sorry, these credentials do not match our records.'])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.create'); // Use a named route for login
    }
}
