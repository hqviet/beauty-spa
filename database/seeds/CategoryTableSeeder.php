<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Lotion', 'Lipstick', 'Perfume'];

        for ($i = 0; $i < count($array); $i++) {
            DB::table('categories')->insert([
                'name' => $array[$i],
                'slug' => str_slug($array[$i]),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
