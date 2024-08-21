<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $userType = ['customer', 'store_manager'];

        foreach ($userType as $user) {
            $userData = User::create([
                'name' => $faker->firstName,
                'email' => $faker->email,
                'password' => bcrypt($user . '_password'), // Assuming 'password' is the password
            ]);

            if (!Role::where(['name' => $user, 'guard_name' => 'api'])->exists()) {
                // Create the role if it does not exist
                Role::create(['name' => $user, 'guard_name' => 'api']);
            }
            // Assign a role
            $userData->assignRole($user);
        }
    }
}
