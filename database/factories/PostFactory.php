<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id ,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


// *the following line if you want to create a new user for each post instead of using an existing one (change the logic as needed):
// 'user_id' => function () {
            //     return User::factory()->create()->id;
            // },