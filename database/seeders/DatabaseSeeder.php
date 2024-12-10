<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'first_name' => 'cs',
            'last_name' => 'child',
            'is_admin' => 1,
            'image' => "C:\Users\Richard Kodah\OneDrive\Desktop\WhatsApp Image 2024-11-17 at 09.12.10_1c52a29e.jpg",
            'email' => 'cschild2000@gmail.com',
            'phone' => '0244765116', // Add a sample phone number
            'bio' => 'My name CS CHILD, a passionate software engineer, a writer, 
            a data scienctist , an innovator and a computer science student',
            'password' => Hash::make('cschild2000'), 
        ]);
        Author::factory()->create([
            'user_id' => $user-> id,
            'first_name' => $user-> first_name,
            'last_name' => $user-> last_name,
            'email' => $user-> email,
            'bio' => $user-> bio,
            'contact' => $user-> phone,

        ]);
        
    }
}
