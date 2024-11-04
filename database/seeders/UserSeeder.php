<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $imagePath = public_path('images/profiles/sample.jpg');

        foreach (range(1, 10) as $index) {
            User::create([
                'id' => (string) \Illuminate\Support\Str::uuid(), 
                'name' => "User {$index}",
                'email' => "user{$index}@example.com",
                'password' => Hash::make('password'),
                'bio' => "This is user {$index}'s bio.",
                'profile_image' => $this->convertImageToBinary($imagePath),
            ]);
        }
    }

    private function convertImageToBinary($imagePath)
    {
        return file_exists($imagePath) ? file_get_contents($imagePath) : null;
    }
}
