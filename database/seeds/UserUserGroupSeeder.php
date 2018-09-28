<?php

use Illuminate\Database\Seeder;
use App\UserUserGroup;
class UserUserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserUserGroup::create([
            'user_id' => 1,
            'user_group_id' => 1
        ]);

        UserUserGroup::create([
            'user_id' => 1,
            'user_group_id' => 2
        ]);
        UserUserGroup::create([
            'user_id' => 2,
            'user_group_id' => 3
        ]);
    }
}
