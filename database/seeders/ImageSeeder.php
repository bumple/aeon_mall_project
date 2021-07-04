<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'image' => Str::random(10),
            'product_id' => 36,
        ]);

        DB::table('images')->insert([
            'image' => Str::random(10),
            'product_id' => 36,
        ]);

        DB::table('images')->insert([
            'image' => Str::random(10),
            'product_id' => 36,
        ]);

        DB::table('images')->insert([
            'image' => Str::random(10),
            'product_id' => 37,
        ]);
    }
}
