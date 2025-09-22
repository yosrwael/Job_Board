<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\JobListingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(
            RolesAndPermissionsSeeder::class,
            AdminUserSeeder::class,
        );
        $this->call([
            JobListingSeeder::class,
            ApplicationSeeder::class,
        ]);
    }
}
