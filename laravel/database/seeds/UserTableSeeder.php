<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'admin@mail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'user@mail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'email' => 'nonverified@mail.com',
                'password' => bcrypt('password'),
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
