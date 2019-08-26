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
        $image_path = array('1'=>'house.jpg','2'=>'house1.jpg');
        //
        foreach (range(1, 20) as $index) {
            $districtIdRand = $districts[array_rand($districts)];
            Article::create([
                'title' => $title =  $faker->sentence($nbWords = rand(5, 9), $variableNbWords = true),
                'slug' => str_replace(' ','-',$title),
                'content' => $faker->paragraph,
                'address' => $faker->address,
                'contact' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'price' => $faker->numberBetween($min = 500000, $max = 2000000),
                'status' => 'Còn Trống',
                'image_path' => serialize($image_path),
                'district_id'=>$districtIdRand,
                'user_id' => $faker->numberBetween($min = 1, $max = 5),
            ]);
        }
    }
}
