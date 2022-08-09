<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;



class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // random and fake data just for test 

       for ($i = 0; $i < 10; $i++) {

        DB::table('products')->insert([
            'title' => Str::random(7),
            'price' => rand(10, 300),
            'description' =>  Str::random(7) . '' . Str::random(12) . '' . Str::random(5),
            'categories_id' => rand(1, 3),
        ]);
    }
    }
}
