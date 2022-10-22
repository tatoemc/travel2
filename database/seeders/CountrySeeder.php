<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    
    public function run()

    {

        Country::truncate();
        $countries = [
           
            ['name' => 'السودان', 'code' => 'SD'],
            ['name' => 'المملكة العربية السعودية', 'code' => 'SA'],
            ['name' => 'اليمن', 'code' => 'YE'],
            ['name' => 'البحرين', 'code' => 'BH'],
            ['name' => 'ايران, Islamic Republic of', 'code' => 'IR'],
            ['name' => 'العراق', 'code' => 'IQ'],
            ['name' => 'الامارات العربية المتحدة', 'code' => 'AE'],
            ['name' => 'الكويت', 'code' => 'KW'],
            ['name' => 'الاردن', 'code' => 'JO'],
            ['name' => 'تونس', 'code' => 'TN'],
            ['name' => 'تركيا', 'code' => 'TR'],
            ['name' => 'قطر', 'code' => 'QA'],
            ['name' => 'المملكة المتحدة', 'code' => 'GB'],
            ['name' => 'الولايات المتحدة', 'code' => 'US'],
            ['name' => 'مصر', 'code' => 'EG'],
            ['name' => 'عمان', 'code' => 'OM'],
            ['name' => 'لبنان', 'code' => 'LB'],
            ['name' => 'لبيا', 'code' => 'LY'],
            ['name' => 'ماليزيا', 'code' => 'MY'],
            ['name' => 'كندا', 'code' => 'CA'],
            ['name' => 'الصين', 'code' => 'CN'],
            ['name' => 'كرواتيا', 'code' => 'HR'],
            ['name' => 'دنيمارك', 'code' => 'DK'],
            ['name' => 'اثيوبيا', 'code' => 'ET'],
            ['name' => 'فرنسا', 'code' => 'FR'],
            ['name' => 'المانيا', 'code' => 'DE'],
            ['name' => 'الهند', 'code' => 'IN'],
            ['name' => 'اندونيسيا', 'code' => 'ID'],
            ['name' => 'ايطاليا', 'code' => 'IT'],
            ['name' => 'جامايكا', 'code' => 'JM'],
            ['name' => 'اليابان', 'code' => 'JP'],
            ['name' => 'كينيا', 'code' => 'KE'],
            ['name' => 'نيجريا', 'code' => 'NG'],
            ['name' => 'روسيا Federation', 'code' => 'RU'],
            ['name' => 'الصومال', 'code' => 'SO'],
            ['name' => 'جنوب افريقيا', 'code' => 'ZA'],
            ['name' => 'جنوب السودان', 'code' => 'SS'],
           
           

        ];

          

        foreach ($countries as $key => $value) {

            Country::create($value);

        }

    }



}//end
