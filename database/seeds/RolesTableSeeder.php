<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role = \App\Role::create([
           'name' => 'super_admin',
           'display_name' => 'Super Admin',
           'description' => 'Super Admin makes any thing',
       ]);
    }
}
