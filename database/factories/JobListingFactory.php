<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(5),
            'responsibilities' => $this->faker->paragraph(3),
            'skills' => $this->faker->words(5, true),
            'qualifications' => $this->faker->sentence(),
            'salary' => $this->faker->numberBetween(5000, 20000),
            'benefits' => $this->faker->sentence(),
            'location' => $this->faker->city(),
            'work_type' => $this->faker->randomElement(['remote', 'on-site', 'hybrid']),
            'deadline' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
