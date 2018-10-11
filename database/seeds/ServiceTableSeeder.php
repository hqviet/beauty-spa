<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $id = DB::table('services')->insertGetId([
                'slug' => 'slug' . $i,
                'category_service_id' => random_int(1, 5),
                'price' => 123.12,
                'image' => '1.jpg'
            ]);
            DB::table('services_translations')->insert([
                'services_id' => $id,
                'lang' => 'vi',
                'name' => '[vi] name ' . $i,
                'short_description' => '[vi] short description', 
                'description' => '[vi] description'
            ]);
            DB::table('services_translations')->insert([
                'services_id' => $id,
                'lang' => 'en',
                'name' => '[en] name ' . $i,
                'short_description' => '[en] short description', 
                'description' => '[en] description'
            ]);
        } 
    }
}
