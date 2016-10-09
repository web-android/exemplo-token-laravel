<?php

use App\Role;
use Illuminate\Database\Seeder;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $criador = new Role();
      $criador->name = "criador";
      $criador->display_name = "Criador";
      $criador->description = "Criador da Tarefa" ;
      $criador->save();

      $admin = new Role();
      $admin->name = "admin";
      $admin->display_name = "Admin";
      $admin->description = "Administrador do Sistema" ;
      $admin->save();

      $moderador = new Role();
      $moderador->name = "moderador";
      $moderador->display_name = "Moderador";
      $moderador->description = "Moderador do Sistema" ;
      $moderador->save();
    }
}
