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
        $userID = DB::table('users')->pluck('id')->toArray();
        $districtID = DB::table('districts')->pluck('id')->toArray();
        $faker = Faker\Factory::create();
        for ($i=0; $i < 20; $i++) {
            $userIDRand = $userID[array_rand($userID)];
            $districtIDRand = $districtID[array_rand($districtID)];
            $checkExists = DB::table('articles')->where('user_id', $userIDRand)->where('district_id', $districtIDRand)->exists();
            if (!$checkExists) {
                DB::table('articles')->insert([
                    'title' => $faker->sentence,
                    'slug' => $faker->slug,
                    'content' => $faker->text,
                    'address' => $faker->address,
                    'contact' => $faker->phoneNumber,
                    'price' => $faker->randomNumber(2),
                    'image_path' => $faker->imageUrl($width = 640, $height = 480),
                    'user_id' => $userIDRand,
                    'district_id' => $districtIDRand
                ]);
            }
        }
    }
}
