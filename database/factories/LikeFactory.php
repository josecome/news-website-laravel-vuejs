<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $videos_id = \App\Models\News::pluck('id')->toArray();
        $type_of_like = ['like', 'love', 'sad'];
        $likeable = ['App\Models\News', 'App\Models\Comment'];
        return [
                'type' => $type_of_like[array_rand($type_of_like)],
                'likeable_type' => $likeable[array_rand($likeable)],
                'likeable_id' => $videos_id[array_rand($videos_id)],
                'user_id' => random_int(1, 6),
        ];
    }
}
