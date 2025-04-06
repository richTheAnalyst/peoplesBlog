<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'cschild',
            'first_name' => 'cs',
            'last_name' => 'child',
            
            'is_admin' => 1,
            'image' => '',
            'email' => 'cschild677@gmail.com',
            'phone' => '0244765116', // Add a sample phone number
            'bio' => 'My name CS CHILD, a passionate software engineer, a writer, 
            a data scienctist , an innovator and a computer science student',
            'password' => Hash::make('cschild@677'), 
        ]);
        Author::factory()->create([
            'user_id' => $user-> id,
            'name' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user-> email,
            'bio' => $user-> bio,
            'contact' => $user-> phone,

        ]);
        
        
    }
}
