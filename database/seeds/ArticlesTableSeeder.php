<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\District;
use App\Article;

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
        $districts = District::pluck('id')->toArray();
        //
        foreach (range(1, 20) as $index) {
            $districtIdRand = $districts[array_rand($districts)];
            Article::create([
                'title' => $title =  $faker->sentence($nbWords = rand(5, 9), $variableNbWords = true),
                'slug' => str_replace(' ','-',$title),
                'content' => $faker->paragraph,
                'address' => $faker->address,
                'contact' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'price' => $faker->ean8,
                'status' => 'Còn Trống',
                'image_path' => $faker->image($dir = null, $width = 640, $height = 480, 'cats', false),
                'district_id'=>$districtIdRand,
                'user_id' => $faker->numberBetween($min = 1, $max = 5),
            ]);
        }
    }
}
