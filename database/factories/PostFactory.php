<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5), // Генерирует предложение из 5 слов
            'content' => $this->faker->paragraphs(3, true), // Несколько параграфов
            'image' => $this->faker->imageUrl(640, 480, 'technics'), // Технические изображения
            'likes' => random_int(1, 3000),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
