<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edition>
 */
class EditionFactory extends Factory
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
            'name' => $this->faker->realText($maxNbChars = 60),
            'number' => $this->faker->numberBetween(1,1000),
            'description' => $this->faker->realText($maxNbChars = 100),
            'user_id' => Arr::random($users),
            'created_at' =>$this->faker->dateTime()->format('d-m-Y H:i:s')
        ];
    }
}
