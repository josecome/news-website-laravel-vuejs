<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(6)->create();
        $this->call(EditionSeeder::class);
        $this->call(NewsMetaSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(LikeSeeder::class);
    }
}
