<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Move image to storage
        $filePath = 'public/TNG.jpeg';
        Storage::put($filePath, file_get_contents('C:/Users/richa/OneDrive/Desktop/TNG.jpeg'));

        $user = User::factory()->create([
            'name' => 'cschild',
            'first_name' => 'cs',
            'last_name' => 'child',
            'is_admin' => 1,
            'image' => '', // Store only the filename
            'email' => 'cschild677@gmail.com',
            'phone' => '0244765116',
            'bio' => 'My name is CS CHILD, a passionate software engineer, a writer, 
                a data scientist, an innovator, and a computer science student.',
            'password' => Hash::make('cschild677'), 
        ]);

        Author::factory()->create([
            'user_id' => $user->id,
            'name' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'bio' => $user->bio,
            'contact' => $user->phone,
        ]);
    }
}

