<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
   
    
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i=0; $i < 40; $i++) { 
            $id = DB::table('products')->insertGetId([
                'slug' => str_slug('product' . $i),
                'brand_id' => random_int(1, 5),
                'category_id' => random_int(1, 3),
                'price' => random_int(10, 1000),
                'quantity' => random_int(0, 50),
                'image' => '1.jpg'
            ]);
            DB::table('product_trans')->insert([
                'product_id' => $id,
                'name' => 'product ' . $i,
                'lang' => 'en',
                'description' => '[en] lorem ipsum'
            ]);
            DB::table('product_trans')->insert([
                'product_id' => $id,
                'name' => 'san pham ' . $i,
                'lang' => 'vi',
                'description' => '[vi] lorem ipsum'
            ]);
        }    
    }
}
