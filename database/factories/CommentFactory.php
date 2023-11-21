<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $videos_id = \App\Models\News::pluck('id')->toArray();
        $like_type = ['like', 'love', 'sad'];
        return [
            'comment' => $this->faker->text($maxNbChars = 100),
            'news_id' => $videos_id[array_rand($videos_id)],
            'user_id' => random_int(1, 6),
        ];
    }
}
