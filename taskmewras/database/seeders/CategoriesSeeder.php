<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // random data

         DB::table('categories')->insert([
            'title' => 'men',
        ]);

        DB::table('categories')->insert([
            'title' => 'women',
        ]);

        DB::table('categories')->insert([
            'title' => 'kids',
        ]);
    }
}
