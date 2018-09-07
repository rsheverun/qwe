<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::Create(['name'=>'admin']);
        Role::Create(['name'=>'user']);
    }
}