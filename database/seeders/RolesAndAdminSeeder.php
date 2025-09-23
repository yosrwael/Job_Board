<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'employer', 'candidate'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

 
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'admin',
                'password' => bcrypt('password'), 
            ]
        );

        $admin->syncRoles(['admin']);

        $employer = User::firstOrCreate(
            ['email' => 'employer@example.com'],
            [
                'name' => 'employer',
                'password' => bcrypt('password'),
            ]
        );
        $employer->syncRoles(['employer']);

        $candidate = User::firstOrCreate(
            ['email' => 'candidate@example.com'],
            [
                'name' => 'candidate',
                'password' => bcrypt('password'),
            ]
        );
        $candidate->syncRoles(['candidate']);
    }

}
