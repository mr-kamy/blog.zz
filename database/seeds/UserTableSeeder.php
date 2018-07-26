<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_member = \App\Role::where('name', 'member')->first();
        $role_admin = \App\Role::where('name', 'admin')->first();

        $member = new \App\User();
        $member->name = 'Vasiliy';
        $member->email = 'vasya@google.com';
        $member->password = bcrypt('123456');
        $member->save();
        $member->roles()->attach($role_member);

        $admin = new \App\User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('789456');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
