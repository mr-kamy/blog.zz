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
        $role_member = new \App\Role();
        $role_member->name = 'member';
        $role_member->description = 'A member user';
        $role_member->save();

        $role_admin = new \App\Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An admin user';
        $role_admin->save();
    }
}
