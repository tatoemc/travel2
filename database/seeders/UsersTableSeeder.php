<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '0911405218',
            'add' => 'الخرطوم',
            'user_type' => 'admin',
            'gender' => 'ذكر',
            'passport' => '123456',
            'images' => 'default.png',
            ]);
    }
}
