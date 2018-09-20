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
            $name = ['Hand & Body Lotion', 'Excelsior Hair Mask', 'Lip Gloss', 'Mascara'][random_int(0, 3)] . " " . random_int(1, 10000);

            DB::table('products')->insert([
                'name' => $name,
                'slug' => str_slug($name),
                'brand_id' => random_int(1, 5),
                'category_id' => random_int(1, 3),
                'price' => random_int(10, 1000),
                'quantity' => random_int(0, 50),
                'desc_en' => '[en] description',
                'desc_vi' => '[vi] description',
            ]);
        }    
    }
}
