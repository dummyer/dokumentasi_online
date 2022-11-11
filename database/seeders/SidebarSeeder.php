<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarSeeder extends Seeder
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
                'title' => 'Prologue',
                'is_parent' => true,
                'link_code' => null,
                'parent_id' => null,
                'is_direct' => false,
                'is_scroll' => false,
                'version_id' => 1,
            ],
			[
                'title' => 'Getting Started',
                'is_parent' => true,
                'link_code' => null,
                'parent_id' => null,
                'is_direct' => false,
                'is_scroll' => false,
                'version_id' => 1,
            ],
			
			///////////////////////////////////////////////////
				[
					'title' => 'Release Notes',
					'is_parent' => false,
					'link_code' => 'releases',
					'parent_id' => 1,
					'is_direct' => true,
					'is_scroll' => false,
					'version_id' => 1,
				],
				[
					'title' => 'Upgrade Guide',
					'is_parent' => false,
					'link_code' => 'upgrade',
					'parent_id' => 1,
					'is_direct' => true,
					'is_scroll' => false,
					'version_id' => 1,
				],
				[
					'title' => 'Contribution Guide',
					'is_parent' => false,
					'link_code' => 'contributions',
					'parent_id' => 1,
					'is_direct' => true,
					'is_scroll' => false,
					'version_id' => 1,
				],
				
			/////////////////////////////////////////////////////
			
				[
					'title' => 'Installation',
					'is_parent' => false,
					'link_code' => 'installation',
					'parent_id' => 2,
					'is_direct' => true,
					'is_scroll' => false,
					'version_id' => 1,
				],
				[
					'title' => 'Configuration',
					'is_parent' => false,
					'link_code' => 'configuration',
					'parent_id' => 2,
					'is_direct' => true,
					'is_scroll' => false,
					'version_id' => 1,
				],
				[
					'title' => 'Directory Structure',
					'is_parent' => false,
					'link_code' => 'structure',
					'parent_id' => 2,
					'is_direct' => true,
					'is_scroll' => false,
					'version_id' => 1,
				],
            
        ];
        foreach ($data as $value) {
            DB::table('sidebars')->insert([
                'title' => $value['title'],
                'is_parent' => $value['is_parent'],
                'link_code' => $value['link_code'],
                'parent_id' => $value['parent_id'],
                'is_direct' => $value['is_direct'],
                'is_scroll' => $value['is_scroll'],
                'version_id' => $value['version_id'],
            ]);
        }
    }
}
