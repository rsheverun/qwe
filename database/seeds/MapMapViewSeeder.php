<?php

use Illuminate\Database\Seeder;
use App\VmapMapviewConfig;
class MapMapViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VmapMapviewConfig::create([
            'value' => 'value1Map',
            'description'=>'desc1Map'
        ]);
        VmapMapviewConfig::create([
            'value' => 'value2Map',
            'description'=>'desc2Map'
        ]);
        
    }
}
