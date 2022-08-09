<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // random and fake data just for test 
        for ($i = 0; $i < 7; $i++) {

            DB::table('users')->insert([
                'user_name' => Str::random(7),
                'user_email' => Str::random(7) . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
