<?php

use Illuminate\Database\Seeder;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = [
            'org_name',
            'server',
            'port'
        ];
        foreach ($keys as $value) {
            App\Key::create([
                'name' => $value
            ]);
        }
    }
}
