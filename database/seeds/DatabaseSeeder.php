<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ConfigsetsSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(RolesSeed::class);
        $this->call(UsersSeed::class);
        // $this->call(Camimages::class);
        // $this->call(Cameras::class);
        // $this->call(Camera_UsergroupsSeeder::class);
        $this->call(MapInstanceSeeder::class);
        $this->call(MapMapViewSeeder::class);
        $this->call(HuntingAreasSeeder::class);
        $this->call(AreaGroupSeeder::class);
        $this->call(UserUserGroupSeeder::class);
    }
}
