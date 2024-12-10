<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Post $post)
{
    return $user->id === $post->user_id; // Example: only the post owner can update
}

public function delete(User $user, Post $post)
{
    // Define logic to authorize post deletion (e.g., user is the author)
    return $user->id === $post->user_id; // Only allow the post author to delete the post
}

    public function __construct()
    {
        //
    }
}
