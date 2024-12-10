<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;  // Use User model
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Method to display the user profile
    public function profile($id)
    {
        $user = User::findOrFail($id);
        $posts= Post::where('user_id', $user->id)
                   ->latest()
                   ->paginate(2);

       return view('auth.users.profile',[
        'posts'=>$posts, 
        'user' => $user
    ]);
    }
    
    // Show the form to create a user (admin can create users)
    public function create()
    {
        return view('auth.users.create'); // View that holds the form
    }

    // Display the user's profile and their posts
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::where('user_id', $id)->latest()->get(); // Retrieve posts by user
    
        return view('auth.users.profile', compact('user', 'posts'));
    }
    

    // Store the new user (author)
    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',  // Ensure the email is unique in users table
            'bio' => 'required|string',  // You might add a bio field to your user model
            'contact' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_admin' => 'nullable|boolean', 
            'password' => 'required|string|min:8|confirmed',
        ]);
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

       

        // If there's an image uploaded, store it
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user_images', 'public');
            $user->image = $imagePath;
            $user->save();  // Save the image path to the user record
        }

        $author = new Author();
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->user_id = $user->id;
        $author->bio = $request->bio;
        $author->image = $request->image;
        $author->email = $request->email;
        $author->contact = $request->contact;
    
        if ($request->hasFile('image')) {
            $author->image = $request->file('image')->store('author_images', 'public');
        }
    
        $author->save();
    
      

        // Redirect or return response
        return redirect()->route('users.profile', $user->id)->with('status', 'User created successfully!');
    }

    // Show the edit form for the user (profile)
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.users.edit', compact('user'));
    }

    // Update the user's profile
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'bio' => 'nullable|string|max:500',
        'contact' => 'nullable|string|max:15',
        'image' => 'nullable|image|max:2048',
    ]);
    
    // Image upload handling
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        
        $imagePath = $request->file('image')->store('user_images', 'public');
        $validatedData['image'] = $imagePath;
    }

    $user->update($validatedData);
    
    return redirect()->route('users.profile', $user->id)
                     ->with('success', 'Profile updated successfully!');
}

    //function or method to delete a user
    public function destroy($id){
        $user = User::findOrFail($id);
        if($user->delete()){
            return redirect()->route('users.create')->with('success', 'user deleted successfully.');
        }
    }
}

