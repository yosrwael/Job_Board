<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\JobListing;

class JobListingSeeder extends Seeder
{
    public function run(): void
    {
       
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        if (method_exists($user, 'assignRole')) {
            $user->assignRole('employer');
        }

        $category = Category::firstOrCreate(['name' => 'IT']);

        JobListing::factory()->count(10)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);
    }
}
