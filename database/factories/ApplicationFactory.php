<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'job_listing_id'       => JobListing::factory(),
            'user_id'      => User::factory(),
            'contact_info' => $this->faker->email,
            'status'       => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
