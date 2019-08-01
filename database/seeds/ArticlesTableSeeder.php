<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 20; $i++) {
            DB::table('articles')->insert([
                'title' => $faker->sentence,
                'content' => $faker->text,
                'address' => $faker->address,
                'contact' => $faker->phoneNumber,
                'image_path' => $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
}
