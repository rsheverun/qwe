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
            'name' => 'UserOne',
            'password' => bcrypt('123qwe'),
            'verified' => 1,
            'group_id' => 1,
         ]);
 
         $user1->assignRole('active');

         $user2 = User::create([
            'email' => 'user2@user.com',
            'name' => 'UserTwo',
            'password' => bcrypt('123qwe'),
            'verified' => 1,
            'group_id' => 2,
         ]);
 
         $user2->assignRole('inactive');
    }
}
