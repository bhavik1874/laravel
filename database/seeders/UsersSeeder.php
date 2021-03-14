<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
   

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@bhavik.com',
               'is_admin'=>'1',
               'password'=> bcrypt('Bhavik@7'),
            ],
            [
               'name'=>'User',
               'email'=>'user@bhavik.com',
               'is_admin'=>'0',
               'password'=> bcrypt('Bhavik@7'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}