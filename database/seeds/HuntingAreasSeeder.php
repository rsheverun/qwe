<?php

use Illuminate\Database\Seeder;
use App\HuntingArea;
class HuntingAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HuntingArea::create([
            'name'=>'testArea1',
            'description'=>'ddesc1',
            'vmap_instance_id'=>1,
            'vmap_mapviewid_id'=>1
        ]);
        HuntingArea::create([
            'name'=>'testArea2',
            'description'=>'ddesc2',
            'vmap_instance_id'=>2,
            'vmap_mapviewid_id'=>2
        ]);
    }
}
