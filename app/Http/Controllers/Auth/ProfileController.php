<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use App\Models\User;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
   {
    $user = Auth::user(); // or however you're getting the user
    return view('your-view-name', compact('user'));
   }

    public function edit(){
        $user = Auth::user();

        if (!$user) {
            // Handle the case where there is no authenticated user
            return redirect()->route('login.create')->withErrors(['error' => 'User not authenticated.']);
        }
        return view('auth.users.edit', compact('user'));

    }

    public function update(Request $request){
        $updatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email,' . Auth::id()],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['nullable', 'string', 'min:6', 'max:255'],
        ]);

         $user = Auth::user();

         $user->first_name = $updatedData['first_name'];
         $user->last_name = $updatedData['last_name'];
         $user->email = $updatedData['email'];
         $user->phone = $updatedData['phone'];

         if( $request->filled('password')){
            $user->password = Hash::make($updatedData['password']);
         }

         $user->save();

         return redirect()->route('post.index')->with('success', 'Profile updated successfully.');

        
    }

    public function delete(Request $request){
        $user =Auth::user();

        $user->delete();
        Auth::logout();
        
        return redirect()->route('post.index')->with('Success', 'Profile deleted successfully.');
    }
}
