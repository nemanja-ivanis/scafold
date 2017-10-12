<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_owner=new \App\User();
        $user_owner->name='User1';
        $user_owner->email='user1@example.com';
        $user_owner->password=bcrypt('user123');
        $user_owner->save();

        $user_admin=new \App\User();
        $user_admin->name='User2';
        $user_admin->email='user2@example.com';
        $user_admin->password=bcrypt('user123');
        $user_admin->save();


        $owner = new \App\Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new \App\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $user_owner->attachRole($owner);
        $user_admin->attachRole($admin);
    }
}
