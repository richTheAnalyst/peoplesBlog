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
        $imagePath = "images/AR_and_VR_" . uniqid() . ".jpeg"; // A unique name for each image
        
        // Simulate uploading the image
        Storage::disk('public')->put($imagePath, file_get_contents("C:\\Users\\Richard Kodah\\OneDrive\\Desktop\\AR and VR.jpeg"));
    
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
