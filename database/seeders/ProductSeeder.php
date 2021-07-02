<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => Str::random(10),
            'description' => Str::random(10),
            'unit_price' => rand(1,100),
            'brand_id' => 7,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'product_name' => Str::random(10),
            'description' => Str::random(10),
            'unit_price' => rand(1,100),
            'brand_id' => 7,
            'category_id' => 2,
        ]);

        DB::table('products')->insert([
            'product_name' => Str::random(10),
            'description' => Str::random(10),
            'unit_price' => rand(1,100),
            'brand_id' => 7,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'product_name' => Str::random(10),
            'description' => Str::random(10),
            'unit_price' => rand(1,100),
            'brand_id' => 7,
            'category_id' => 2,
        ]);
    }
}
