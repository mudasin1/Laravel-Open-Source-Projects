<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the projects table with a curated catalog.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Akaunting',
                'project_type' => 'package',
                'catalog_letter' => 'A',
                'homepage_url' => 'https://akaunting.com',
                'repository_url' => 'https://github.com/akaunting/akaunting',
                'credit_name' => 'Akaunting',
                'credit_url' => 'https://github.com/akaunting',
                'description' => 'Free and online accounting software with invoicing, expenses, and cashflow tools.',
                'is_featured' => true,
            ],
            [
                'name' => 'Apiato',
                'project_type' => 'framework',
                'catalog_letter' => 'A',
                'homepage_url' => 'https://github.com/apiato/apiato',
                'repository_url' => 'https://github.com/apiato/apiato',
                'credit_name' => 'Apiato',
                'credit_url' => 'https://github.com/apiato',
                'description' => 'API-centric application framework built on Laravel with modular architecture.',
                'is_featured' => false,
            ],
            [
                'name' => 'Bagisto',
                'project_type' => 'ecommerce',
                'catalog_letter' => 'B',
                'homepage_url' => 'https://bagisto.com',
                'repository_url' => 'https://github.com/bagisto/bagisto',
                'credit_name' => 'Webkul',
                'credit_url' => 'https://github.com/bagisto',
                'description' => 'Headless-ready Laravel and Vue.js e-commerce platform.',
                'is_featured' => true,
            ],
            [
                'name' => 'Cachet',
                'project_type' => 'status-page',
                'catalog_letter' => 'C',
                'homepage_url' => 'https://cachethq.io',
                'repository_url' => 'https://github.com/cachethq/Cachet',
                'credit_name' => 'CachetHQ',
                'credit_url' => 'https://github.com/cachethq',
                'description' => 'Incident and status page system with metrics, components, and subscriber notifications.',
                'is_featured' => false,
            ],
            [
                'name' => 'Larablog',
                'project_type' => 'cms',
                'catalog_letter' => 'L',
                'homepage_url' => 'https://github.com/jeremykenedy/larablog',
                'repository_url' => 'https://github.com/jeremykenedy/larablog',
                'credit_name' => 'jeremykenedy',
                'credit_url' => 'https://github.com/jeremykenedy',
                'description' => 'CRUD blog boilerplate on Laravel with Bootstrap front-end.',
                'is_featured' => false,
            ],
            [
                'name' => 'LaraAdmin',
                'project_type' => 'admin-panel',
                'catalog_letter' => 'L',
                'homepage_url' => 'https://github.com/dwijitsolutions/laraadmin',
                'repository_url' => 'https://github.com/dwijitsolutions/laraadmin',
                'credit_name' => 'dwijitsolutions',
                'credit_url' => 'https://github.com/dwijitsolutions',
                'description' => 'Admin panel / CMS boilerplate that accelerates CRUD-heavy back office screens.',
                'is_featured' => false,
            ],
            [
                'name' => 'Laracogs',
                'project_type' => 'scaffolding',
                'catalog_letter' => 'L',
                'homepage_url' => 'https://github.com/YABhq/Laracogs',
                'repository_url' => 'https://github.com/YABhq/Laracogs',
                'credit_name' => 'YABhq',
                'credit_url' => 'https://github.com/YABhq',
                'description' => 'Starter kit with authentication, teams, and admin tooling for Laravel apps.',
                'is_featured' => false,
            ],
            [
                'name' => 'Laravel Enterprise Starter Kit',
                'project_type' => 'starter-kit',
                'catalog_letter' => 'L',
                'homepage_url' => 'https://github.com/leskhq/laravel-enterprise-starter-kit',
                'repository_url' => 'https://github.com/leskhq/laravel-enterprise-starter-kit',
                'credit_name' => 'LeskHQ',
                'credit_url' => 'https://github.com/leskhq',
                'description' => 'Laravel LTS template with enterprise-minded features and modular design.',
                'is_featured' => true,
            ],
            [
                'name' => 'Laravel-Users',
                'project_type' => 'user-management',
                'catalog_letter' => 'U',
                'homepage_url' => 'https://github.com/jeremykenedy/laravel-users',
                'repository_url' => 'https://github.com/jeremykenedy/laravel-users',
                'credit_name' => 'jeremykenedy',
                'credit_url' => 'https://github.com/jeremykenedy',
                'description' => 'User management package with dashboards, roles, and scaffolding.',
                'is_featured' => false,
            ],
            [
                'name' => 'Laravel Voyager',
                'project_type' => 'admin-panel',
                'catalog_letter' => 'V',
                'homepage_url' => 'https://voyager.devdojo.com/',
                'repository_url' => 'https://github.com/the-control-group/voyager',
                'credit_name' => 'The Control Group',
                'credit_url' => 'https://github.com/the-control-group',
                'description' => 'Admin package with BREAD (Browse, Read, Edit, Add, Delete) builder and media manager.',
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            $project['slug'] = Str::slug($project['name']);
            $existing = DB::table('projects')->where('slug', $project['slug'])->first();

            if ($existing) {
                DB::table('projects')
                    ->where('slug', $project['slug'])
                    ->update($project);
            } else {
                DB::table('projects')->insert($project);
            }
        }
    }
}
