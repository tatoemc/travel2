<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            $company = [
           
                ['name' => 'الخطوط الجوية السودانية', 'desc' => 'الخطوط الجوية السودانية'],
                ['name' => 'تاركو للطيران', 'desc' => 'تاركو'],
                ['name' => 'بدر للطيران', 'desc' => 'بدر'],
                ['name' => 'طيران الامارات', 'desc' => 'الامارات'],
              
              
            ];
                foreach ($company as $key => $value) {
    
                    Company::create($value);
        
                }


    }




}
