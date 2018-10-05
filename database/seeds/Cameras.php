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
            'latitude' => 48.186487,
            'longitude' => 11.552628,
            'cam_email' => 'wildcam@jungheinrichs.de.jpg',
            'config_id'=> 1
        ]);

        Camera::create([
            'cam' => 'MHA002',
            'cam_model' => 'test 2',
            'cam_name' => 'test cam 2',
            'desc' => 'lorem',
            'latitude' => 48.186487,
            'longitude' => 11.552628,
            'cam_email' => 'testcam2@jungheinrichs.de.jpg',
            'config_id'=> 1
        ]);
    }
}
