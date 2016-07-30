<?php

use Illuminate\Database\Seeder;
use Cronti\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_suscriptor = new Role();
      $role_suscriptor->name = "Suscriptor";
      $role_suscriptor->description = "";
      $role_suscriptor->save();

      $role_client = new Role();
      $role_client->name = "Cliente";
      $role_client->description = "";
      $role_client->save();

      $role_colaborator = new Role();
      $role_colaborator->name = "Colaborador";
      $role_colaborator->description = "";
      $role_colaborator->save();

      $role_administrator = new Role();
      $role_administrator->name = "Administrador";
      $role_administrator->description = "";
      $role_administrator->save();
    }
}
