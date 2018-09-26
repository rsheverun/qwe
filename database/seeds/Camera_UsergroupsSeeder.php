<?php

use Illuminate\Database\Seeder;

class Camera_UsergroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camera_user_group')->insert([
            'camera_id' => 1,
            'user_group_id' => 1,
            
        ]);
        DB::table('camera_user_group')->insert([
            'camera_id' => 1,
            'user_group_id' => 2,
            
        ]);
        // DB::table('camera_hunting_area')->insert([
        //     'camera_id' => 1,
        //     'hunting_area_id' => 1,
            
        // ]);
        // DB::table('camera_hunting_area')->insert([
        //     'camera_id' => 1,
        //     'hunting_area_id' => 3,
            
        // ]);
    }
}
