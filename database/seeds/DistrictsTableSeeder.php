<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = ['Quận Hải Châu','Quận Cẩm Lệ','Quận Thanh Khê','Quận Liên Chiểu','Quận Ngũ Hành Sơn','Quận Sơn Trà','Quận Hòa Vang'];       
        for ($i = 0 ; $i < 7 ; $i++) {
            District::create([
                'name' => $district[$i]
            ]);
        };
    }
}
