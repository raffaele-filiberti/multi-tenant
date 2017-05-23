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
                'name' => 'store_agencies',
                'display_name' => 'Store agencies'
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
                'name' => 'store_users',
                'display_name' => 'Store users'
            ],
            [
                'name' => 'update_users',
                'display_name' => 'Update users'
            ],
            [
                'name' => 'delete_users',
                'display_name' => 'Delete users '
            ],
            //customers
            [
                'name' => 'view_customers',
                'display_name' => 'View customers'
            ],
            [
                'name' => 'store_customers',
                'display_name' => 'Store customers'
            ],
            [
                'name' => 'update_customers',
                'display_name' => 'Update customers'
            ],
            [
                'name' => 'delete_customers',
                'display_name' => 'Delete  customers'
            ],
            //projects
            [
                'name' => 'view_projects',
                'display_name' => 'View projects'
            ],
            [
                'name' => 'store_projects',
                'display_name' => 'Store projects'
            ],
            [
                'name' => 'update_projects',
                'display_name' => 'Update projects'
            ],
            [
                'name' => 'delete_projects',
                'display_name' => 'Delete  projects'
            ],
            //tasks
            [
                'name' => 'view_tasks',
                'display_name' => 'View tasks'
            ],
            [
                'name' => 'store_tasks',
                'display_name' => 'Store tasks'
            ],
            [
                'name' => 'update_tasks',
                'display_name' => 'Update tasks'
            ],
            [
                'name' => 'delete_tasks',
                'display_name' => 'Delete tasks'
            ],
            //files
            [
                'name' => 'upload_step_task_files',
                'display_name' => 'Upload Step Task Files'
            ],
            [
                'name' => 'delete_step_task_files',
                'display_name' => 'Delete Step Task Files'
            ],
            [
                'name' => 'view_step_task_files',
                'display_name' => 'View Step Task Files'
            ],
            [
                'name' => 'download_step_task_files',
                'display_name' => 'Download Step Task Files'
            ],
            [
                'name' => 'approve_step_task_files',
                'display_name' => 'Approve Step Task Files'
            ],
            [
                'name' => 'disapprove_step_task_files',
                'display_name' => 'Disapprove Step Task Files'
            ],
            //dates
            [
                'name' => 'store_step_task_dates',
                'display_name' => 'Upload Step Task Dates'
            ],
            [
                'name' => 'delete_step_task_dates',
                'display_name' => 'Delete Step Task Dates'
            ],
            [
                'name' => 'view_step_task_dates',
                'display_name' => 'View Step Task Dates'
            ],
            [
                'name' => 'approve_step_task_dates',
                'display_name' => 'Approve Step Task Dates'
            ],
            [
                'name' => 'disapprove_step_task_dates',
                'display_name' => 'Disapprove Step Task Dates'
            ],
            //subscribers
            [
                'name' => 'view_subscribers',
                'display_name' => 'View Subscribers'
            ],
            [
                'name' => 'confirm_subscribers',
                'display_name' => 'Confirm Subscribers'
            ],
            [
                'name' => 'delete_subscribers',
                'display_name' => 'Delete Subscribers'
            ],
            //templates
            [
                'name' => 'view_templates',
                'display_name' => 'View templates'
            ],
            [
                'name' => 'store_templates',
                'display_name' => 'Store templates'
            ],
            [
                'name' => 'update_templates',
                'display_name' => 'Update templates'
            ],
            [
                'name' => 'delete_templates',
                'display_name' => 'Delete  templates'
            ],
            //steps
            [
                'name' => 'view_steps',
                'display_name' => 'View steps'
            ],
            [
                'name' => 'store_steps',
                'display_name' => 'Store steps'
            ],
            [
                'name' => 'update_steps',
                'display_name' => 'Update steps'
            ],
            [
                'name' => 'delete_steps',
                'display_name' => 'Delete steps '
            ],
            //details
            [
                'name' => 'view_details',
                'display_name' => 'View details'
            ],
            [
                'name' => 'store_details',
                'display_name' => 'Store details'
            ],
            [
                'name' => 'update_details',
                'display_name' => 'Update details'
            ],
            [
                'name' => 'delete_details',
                'display_name' => 'Delete details '
            ]
        ]);
    }
}
