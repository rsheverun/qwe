<?php

use Illuminate\Database\Seeder;
use App\UserGroup;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserGroup::create([
            'name'=>'admins',
            'role_id'=>1
        ]);
        UserGroup::create([
            'name'=>'main',
            'role_id'=>2
        ]);
        UserGroup::create([
            'name'=>'guest',
            'role_id'=>3
        ]);
    }
}
