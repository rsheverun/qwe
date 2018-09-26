<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'email' => 'user1@user.com',
            'first_name' => 'User1',
            'last_name' => 'One',
            'password' => bcrypt('123qwe'),
            'verified' => 1,
            // 'group_id' => 1,
            'notification'=> 1,
            'nickname' =>'user_1',
         ]);
 
         $user1->assignRole('user');

         $user2 = User::create([
            'email' => 'user2@user.com',
            'first_name' => 'User2',
            'last_name' => 'Two',
            'password' => bcrypt('123qwe'),
            'verified' => 1,
            // 'group_id' => 2,
            'notification'=> 0,
            'nickname' =>'user_2',
         ]);
 
         $user2->assignRole('user');
    }
}
