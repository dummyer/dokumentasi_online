<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'version' => '9.x',
            ],
            [
                'version' => '8.x',
            ],
            [
                'version' => '7.x',
            ],
		
            
        ];
        foreach ($data as $value) {
            DB::table('versions')->insert([
                'version' => $value['version'],
            ]);
        }
    }
}
