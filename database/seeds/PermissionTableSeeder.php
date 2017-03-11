<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            //agencies
            [
                'name' => 'view_agencies',
                'display_name' => 'View agencies'
            ],
            [
                'name' => 'create_agencies',
                'display_name' => 'Create agencies'
            ],
            [
                'name' => 'update_agencies',
                'display_name' => 'Update agencies'
            ],
            [
                'name' => 'delete_agencies',
                'display_name' => 'Delete agencies'
            ],
            //users
            [
                'name' => 'view_users',
                'display_name' => 'View users'
            ],
            [
                'name' => 'create_users',
                'display_name' => 'Create users'
            ],
            [
                'name' => 'update_users',
                'display_name' => 'Update users'
            ],
            [
                'name' => 'delete_users',
                'display_name' => 'Delete users '
            ],
            //costumers
            [
                'name' => 'view_costumers',
                'display_name' => 'View costumers'
            ],
            [
                'name' => 'create_costumers',
                'display_name' => 'Create costumers'
            ],
            [
                'name' => 'update_costumers',
                'display_name' => 'Update costumers'
            ],
            [
                'name' => 'delete_costumers',
                'display_name' => 'Delete  costumers'
            ],
            //templates
            [
                'name' => 'view_templates',
                'display_name' => 'View templates'
            ],
            [
                'name' => 'create_templates',
                'display_name' => 'Create templates'
            ],
            [
                'name' => 'update_templates',
                'display_name' => 'Update templates'
            ],
            [
                'name' => 'delete_templates',
                'display_name' => 'Delete  templates'
            ],
            //tasks
            [
                'name' => 'view_tasks',
                'display_name' => 'View tasks'
            ],
            [
                'name' => 'create_tasks',
                'display_name' => 'Create tasks'
            ],
            [
                'name' => 'update_tasks',
                'display_name' => 'Update tasks'
            ],
            [
                'name' => 'delete_tasks',
                'display_name' => 'Delete tasks '
            ],
            //steps
            [
                'name' => 'view_steps',
                'display_name' => 'View steps'
            ],
            [
                'name' => 'create_steps',
                'display_name' => 'Create steps'
            ],
            [
                'name' => 'update_steps',
                'display_name' => 'Update steps'
            ],
            [
                'name' => 'delete_steps',
                'display_name' => 'Delete steps '
            ],
            //infos
            [
                'name' => 'view_infos',
                'display_name' => 'View infos'
            ],
            [
                'name' => 'create_infos',
                'display_name' => 'Create infos'
            ],
            [
                'name' => 'update_infos',
                'display_name' => 'Update infos'
            ],
            [
                'name' => 'delete_infos',
                'display_name' => 'Delete infos '
            ]
        ]);
    }
}
