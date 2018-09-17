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
            'name'=>'group1',
            'role_id'=>1
        ]);
        UserGroup::create([
            'name'=>'group2',
            'role_id'=>2
        ]);
    }
}
