<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.   CountrySeeder
     *
     * @return void
     */
    public function run() 
    {
        // \App\Models\User::factory(10)->create(); 
        $this->call(UsersTableSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ServiceSeeder::class);
       // $this->call(HajSeeder::class);
    }
}
