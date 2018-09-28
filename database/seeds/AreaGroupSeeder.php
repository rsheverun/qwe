<?php

use Illuminate\Database\Seeder;
use App\HuntingAreaUserGroup;
class AreaGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HuntingAreaUserGroup::create([
            'hunting_area_id' => 1,
            'user_group_id' => 1,
        ]);

        HuntingAreaUserGroup::create([
            'hunting_area_id' => 2,
            'user_group_id' => 1,
        ]);

        HuntingAreaUserGroup::create([
            'hunting_area_id' => 1,
            'user_group_id' => 2,
        ]);

        HuntingAreaUserGroup::create([
            'hunting_area_id' => 2,
            'user_group_id' => 3,
        ]);
    }
}
