<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = ['Cam Le', 'Hai Chau', 'Lien Chieu', 'Ngu Hanh Son', 'Son Tra', 'Thank Khe', 'Hoa Vang', 'Hoang Sa'];
        for ($i=0; $i < count($a); $i++) {
            DB::table('districts')->insert([
                'name'=> $a[$i]
            ]);
        }
    }
}
