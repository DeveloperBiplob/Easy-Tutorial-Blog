<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                // 'user_id' => 1,
                // 'category_id' => rand(1, 5),
                // 'title' => $this->faker->name(),
                // 'slug' => $this->faker->name(),
                // 'image' => 'storage/Post/defalut.png',
                // 'description' => $this->faker->paragraph()

                'user_id' => 1,
                'category_id' => rand(1, 5),
                'title' => Str::random(10),
                'slug' => Str::random(10),
                'image' => 'storage/Post/defalut.png',
                'description' => Str::random(100)
        ];
    }
}
