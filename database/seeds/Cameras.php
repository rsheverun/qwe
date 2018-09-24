<?php

use Illuminate\Database\Seeder;
use App\Camera;

class Cameras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Camera::create([
            'cam' => 'MHA001',
            'cam_model' => 'BL460P',
            'cam_name' => 'Cam At Rosis house',
            'desc' => 'lorem',
            'lat' => '48.186487',
            'long' => '11.552628',
            'group_id' => 1,
            'cam_email' => 'wildcam@jungheinrichs.de.jpg',
            'config_id'=> 1
        ]);
    }
}
