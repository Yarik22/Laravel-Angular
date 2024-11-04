<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $imagePath = public_path('images/posts/sample.jpg');

        foreach (User::all() as $user) {
            Post::create([
                'id' => (string) \Illuminate\Support\Str::uuid(),
                'user_id' => $user->id,
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'image' => $this->convertImageToBinary($imagePath),
                'status' => 'published',
            ]);
        }
    }

    private function convertImageToBinary($imagePath)
    {
        return file_exists($imagePath) ? file_get_contents($imagePath) : null;
    }
}
