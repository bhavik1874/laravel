<?php
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
   
class CreateUsersSeeder extends Seeder
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
               'email'=>'bhavik@mail.com',
               'is_admin'=>'0',
               'password'=> bcrypt('Bhavik@7'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}