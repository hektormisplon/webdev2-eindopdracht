<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = [
            [
                'email' => 'admin@mail.com',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => bcrypt('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'user@mail.com',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'email' => 'nonverified@mail.com',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => bcrypt('password'),
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
