<?php

use Illuminate\Database\Seeder;
use App\Camimage;

class Camimages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Camimage::create([
            'cam_id' => 1,
            'bild'=>'/img/cam/2018-06-11 15_03_35_wildcam@jungheinrichs.de.jpg'
        ]);
    }
}
