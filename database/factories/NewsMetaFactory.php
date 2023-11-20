<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NewsMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        return [
            'title' => $this->faker->unique()->realText($maxNbChars = 30),
            'author' => $this->faker->realText($maxNbChars = 30),
            'news_date' =>$this->faker->dateTime()->format('Y-m-d'),
            'user_id' => Arr::random($users),
            'created_at' =>$this->faker->dateTime()->format('d-m-Y H:i:s')
        ];
    }
}
