<?php

use Illuminate\Database\Seeder;
use App\Configset;

class ConfigsetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configset::create([
                'model' => 'BL460P',
                'config_name'=> 'Default',
                'org_name' => 'MHA',
                'server'=> 'smtp.mycams.com',
                'port'=> 25,
                'user'=> "mha.send@mycams.com",
            ]);
    }
}
