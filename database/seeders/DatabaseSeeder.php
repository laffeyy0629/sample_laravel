<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Database\Factories\BlogFactory;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    // protected $model =Blog::class;

    // public function run(): void
    // {
    //     Blog::factory()->count(20)->create();
    // }
}
