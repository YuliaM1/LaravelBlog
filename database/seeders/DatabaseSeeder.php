<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        $tags = Tag::factory(20)->create();
        $posts = Post::factory(15)->create();

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('P@ssw0rd'),
            'remember_token' => Str::random(9),
            'role' => 1,
        ]);
        User::factory(10)->create();

        foreach ($posts as $post) {
            $tagsIds = $tags->random(3);
            $post->tags()->attach($tagsIds);

            for ($i = 0; $i < rand(1, 4); $i++) {
                Comment::factory()->create([
                    'user_id' => User::get()->random(),
                    'post_id' => $post->id,
                    'message' => fake()->sentence(),
                ]);
            }
        }

        PostUserLike::factory(40)->create();
    }
}
