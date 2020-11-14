<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => "Admin ",
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'status' => 1,
            'about' => 'sfdsldfls',
            'email_verified_at' => now(),
            'password' => bcrypt('1234567'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'first_name' => "Writer",
            'last_name' => 'Admin',
            'email' => 'writter@gmail.com',
            'role' => 'writer',
            'status' => 1,
            'about' => 'sfdsldfls',
            'email_verified_at' => now(),
            'password' => bcrypt('1234567'),
            'remember_token' => Str::random(10),
        ]);
    }
}
