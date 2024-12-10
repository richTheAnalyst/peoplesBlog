<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
  public function welcome(): View
  {
      try {
          $latestPost = Post::latest()->first();
          // Fetch the latest posts
          $posts = Post::latest()
                      ->take(3)
                      ->paginate(5);

          // Get authenticated user
          $user = Auth::user();

          // Return view with both variables
          return view('welcome', [
              'posts' => $posts,
              'latestPost' => $latestPost,
              'user' => $user
          ]);
          
      } catch (\Exception $e) {
          Log::error('Error in WelcomeController:welcome - ' . $e->getMessage());
          
          return view('welcome', [
              'posts' => collect([]),
              'latestPost' => null,
              'user' => null
          ])->with('error', 'Error loading content');
      }
  }
   
}
