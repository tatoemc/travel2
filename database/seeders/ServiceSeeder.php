<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $services = [
           
            ['name' => 'تذاكر طيران', 'desc' => 'تذاكر طيران في جميع الخطوط المحلية','cost'=>'3000'],
            ['name' => 'سياحة داخلية', 'desc' => 'سياحة في كل مدن السودان','cost'=>'5000'],
            ['name' => 'سياحة خارجية', 'desc' => 'سياحة لكل العواصم العالمية','cost'=>'8000'],
            ['name' => 'حج و عمرة', 'desc' => 'توفير خدمتي الحج و العمرة','cost'=>'120000'],
          
          
        ];
            foreach ($services as $key => $value) {

                Service::create($value);
    
            }

    }
}
