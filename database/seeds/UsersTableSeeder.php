<?php

use Illuminate\Database\Seeder;
use Cronti\User;
use Cronti\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'Administrador')->first();
        $administrator = new User();
        $administrator->name = 'Santiago Pereira';
        $administrator->email = 'santiagopb@msn.com';
        $administrator->avatar = 'default.jpg';
        $administrator->password = bcrypt('123456');
        $administrator->save();
        $administrator->roles()->attach($role);
    }
}
