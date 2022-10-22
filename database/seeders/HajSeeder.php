<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Haj;

class HajSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hajs = [
           
            ['name' => 'عمرة', 'date' => '2022-09-26'],
            ['name' => 'حج', 'date' => '2021-09-26'],
            ['name' => 'عمرة', 'date' => '2020-09-26'],
            ['name' => 'حج', 'date' => '2019-09-26'],
          
          
        ];
            foreach ($hajs as $key => $value) {

                Haj::create($value);
    
            }
    }
}
