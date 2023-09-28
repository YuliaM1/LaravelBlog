<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'content' => fake()->paragraphs(5, true),
            'category_id' => Category::get()->random(),
            'preview_image' => Storage::disk('public')->allFiles('/images')[array_rand(Storage::disk('public')->allFiles('/images'))],
            'main_image' => Storage::disk('public')->allFiles('/images')[array_rand(Storage::disk('public')->allFiles('/images'))],
        ];
    }
}
