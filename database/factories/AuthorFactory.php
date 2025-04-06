<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition()
    {
        // Store the image file in the public/images directory
        $imagePath = "images/author_" . uniqid() . ".jpg"; // A unique name for each image
        
        // Using a placeholder image instead of trying to access a local file
        // This ensures the factory works on any environment without file dependencies
        $placeholderUrl = 'https://via.placeholder.com/300x300';
        
        try {
            // Try to get content from placeholder service
            $imageContent = file_get_contents($placeholderUrl);
            Storage::disk('public')->put($imagePath, $imageContent);
        } catch (\Exception $e) {
            // Fallback - just store the path, but the image will be missing
            // You could log this error if needed
            $imagePath = 'images/default-author.jpg';
        }
    
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'bio' => $this->faker->paragraph,
            'contact' => $this->faker->phoneNumber,
            'image' => $imagePath,  // Store the relative image path
        ];
    }
}