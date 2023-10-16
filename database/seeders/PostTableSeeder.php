<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 5; $i++) {
            Post::create([
                'title' => 'Đây là bài post ' . $i,
                'content' => 'This is the content of Post ' . $i,
                'image' => 'null',
                'user_id' => 1,
                'category_id' => 1,
                'like_count' => 0,
            ]);
        }
    }
}
