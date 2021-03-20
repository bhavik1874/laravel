<?php
  
use Illuminate\Database\Seeder;
use App\Models\User;
   
class UserSeeder extends Seeder
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
               'email'=>'bhavik@admin.email',
               'is_admin'=>'1',
               'password'=> bcrypt('bhavik@admin'),
            ],
            [
               'name'=>'User',
               'email'=>'bhavik@user.email',
                'is_admin'=>'0',
               'password'=> bcrypt('bhavik@user'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}