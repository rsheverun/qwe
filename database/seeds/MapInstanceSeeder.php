<?php

use Illuminate\Database\Seeder;
use App\VmapInstanceConfig;
class MapInstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VmapInstanceConfig::create([
            'value' => 'valueInstanceMap1',
            'description' => 'descInstanceMap1'
        ]);
        VmapInstanceConfig::create([
            'value' => 'valueInstanceMap2',
            'description' => 'descInstanceMap2'
        ]);
    }
}
