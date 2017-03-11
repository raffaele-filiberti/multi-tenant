<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'display_name' => 'Admin'
            ],
            [
                'name' => 'creative_director',
                'display_name' => 'Creative Director'
            ],
            [
                'name' => 'designer',
                'display_name' => 'Designer'
            ],
            [
                'name' => 'account_manager',
                'display_name' => 'Account Manager'
            ],
            [
                'name' => 'marketing_manager',
                'display_name' => 'Marketing Manager'
            ],
            [
                'name' => 'product_manager',
                'display_name' => 'Product Manager'
            ],
            [
                'name' => 'guest',
                'display_name' => 'Guest'
            ]
        ]);
    }
}
