<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class AttachRolesToUsers extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $role_criador = Role::where("name", "criador")->first();
      $role_admin = Role::where("name","admin")->first();
      $role_moderador = Role::where("name","moderador")->first();

      $user = User::where("name", "usuario normal")->first();
      $admin = User::where("name", "admin")->first();
      $moderador = User::where("name", "moderador")->first();

      $user->attachRole($role_criador);
      $admin->attachRole($role_admin);
      $moderador->attachRole($role_moderador);

    }
}
