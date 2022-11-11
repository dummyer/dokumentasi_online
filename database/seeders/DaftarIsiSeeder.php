<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarIsiSeeder extends Seeder
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
                'sidebar_id' => 3,
                'title' => 'Meet Laravel',
                'is_parent' => true,
                'parent_id' => null,
                'content' => '<p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p><p>Laravel strives to provide an amazing developer experience while providing powerful features such as thorough dependency injection, an expressive database abstraction layer, queues and scheduled jobs, unit and integration testing, and more.</p><p>Whether you are new to PHP web frameworks or have years of experience, Laravel is a framework that can grow with you. We\'ll help you take your first steps as a web developer or give you a boost as you take your expertise to the next level. We can\'t wait to see what you build.</p>',
				'version_id' => 1,
			],
			[
                'sidebar_id' => 3,
                'title' => 'Your First Laravel Project',
                'is_parent' => true,
                'parent_id' => null,
                'content' => '<p>Before creating your first Laravel project, you should ensure that your local machine has PHP and Composer installed. If you are developing on macOS, PHP and Composer can be installed via Homebrew. In addition, we recommend installing Node and NPM.</p><p>After you have installed PHP and Composer, you may create a new Laravel project via the Composer create-project command:</p><p><code>composer create-project laravel/laravel example-app</code></p>',
				'version_id' => 1,
			],
			
			///////////////////////////////////////////////////
				[
					'sidebar_id' => 3,
					'title' => 'Why Laravel',
					'is_parent' => false,
					'parent_id' => 1,
					'content' => '<p>There are a variety of tools and frameworks available to you when building a web application. However, we believe Laravel is the best choice for building modern, full-stack web applications.</p><ul><li><label>A Progressive Framework</label><p>We like to call Laravel a "progressive" framework. By that, we mean that Laravel grows with you. If you\'re just taking your first steps into web development, Laravel\'s vast library of documentation, guides, and video tutorials will help you learn the ropes without becoming overwhelmed. If you\'re a senior developer, Laravel gives you robust tools for dependency injection, unit testing, queues, real-time events, and more. Laravel is fine-tuned for building professional web applications and ready to handle enterprise work loads.</p></li></ul>',
					'version_id' => 1,
				],
            
        ];
        foreach ($data as $value) {
            DB::table('daftar_isi')->insert([
                'sidebar_id' => $value['sidebar_id'],
                'title' => $value['title'],
                'is_parent' => $value['is_parent'],
                'parent_id' => $value['parent_id'],
                'content' => $value['content'],
                'version_id' => $value['version_id'],
            ]);
        }
    }
}
