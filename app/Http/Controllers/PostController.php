<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests as AccessAuthorizesRequests;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    use AccessAuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $latestPost = Post::with('user')->latest()->first();
        $posts = Post::with('user')->get()->all();
        return view('posts.index', [
            'posts' => $posts, 
            'latestPost' => $latestPost
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        try{
            $validated = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'content' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        
        // Prepare data for post creation
        $postData = $request->only(['title', 'content']);
        $postData['user_id'] = auth()->id(); // Set user_id from the authenticated user
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $postData['image'] = $imagePath; // Store the image path
        }
    
        // Create the post
        Post::create($postData);
    
        return redirect()->route('posts.index')->with('success', 'New post created successfully');
    }
    catch (\Exception $e){
        Log::error('Error creating post: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating post. Please try again.');
    }
}
    
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        try{
        $this->authorize('update', $post);
        $validatedData = $request->validate([
            'title' => ['string', 'min:5', 'max:100'],
            'content' => ['string', 'min:10'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $postUpdate = $request->only(['title', 'content']);
        
        
        // Handle the image upload
        if ($request->hasFile('image')) 
        {
             // Delete old image if exists
             if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $postUpdate['image'] = $imagePath; // Store the image path
        }

        $post->update($postUpdate);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }
    catch (\Exception $e) {
        Log::error('Error updating post: ' . $e->getMessage());
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Error updating post. Please try again.');
    }
}

public function destroy(Post $post): RedirectResponse
{
    try {
        $this->authorize('delete', $post);

        // Delete associated image if exists
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully.');
            
    } catch (\Exception $e) {
        Log::error('Error deleting post: ' . $e->getMessage());
        return redirect()
            ->back()
            ->with('error', 'Error deleting post. Please try again.');
    }
}
}

