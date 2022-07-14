<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::create([

        'name' => 'Administrator',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('password'),
        'phone' => '+07 665 6655',
        'address' => 'Romania, str. 69',
        'role' => 'admin'

      ]);
    }
}
