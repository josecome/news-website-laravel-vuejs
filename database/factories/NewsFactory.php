<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\NewsMeta;
use App\Models\Edition;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $news_meta = NewsMeta::pluck('id')->toArray(); //Extracts id values
        $edition = Edition::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();
        return [
            'title' => $this->faker->unique()->sentence(),
            'content' => $this->faker->realText($maxNbChars = 400),
            'news_date' =>$this->faker->dateTime()->format('Y-m-d'),
            'news_meta_id' => Arr::random($news_meta),
            'edition_id' => Arr::random($edition),
            'user_id' => Arr::random($users),
            'created_at' =>$this->faker->dateTime()->format('d-m-Y H:i:s')
        ];
    }
}
