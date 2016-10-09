<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class AttachPermissionsToRoles extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

      $criador = Role::where("name", "criador")->first();
      $admin = Role::where("name","admin")->first();
      $moderador = Role::where("name","moderador")->first();

      $criar_tarefa = Permission::where("name", "criar-tarefa")->first();
      $ler_tarefa =  Permission::where("name", "ler-tarefa")->first();
      $editar_tarefa =  Permission::where("name", "editar-tarefa")->first();
      $remover_tarefa =  Permission::where("name", "remover-tarefa")->first();
      $editar_todas_tarefas =  Permission::where("name", "editar-todas-tarefas")->first();
      $remover_todas_tarefas =  Permission::where("name", "remover-todas-tarefas")->first();

      $criador->attachPermission($criar_tarefa);
      $criador->attachPermission($ler_tarefa);
      $criador->attachPermission($editar_tarefa);
      $criador->attachPermission($remover_tarefa);

      $moderador->attachPermission($editar_todas_tarefas);
      $moderador->attachPermission($remover_todas_tarefas);

      $admin->attachPermission($criar_tarefa);
      $admin->attachPermission($ler_tarefa);
      $admin->attachPermission($editar_tarefa);
      $admin->attachPermission($remover_tarefa);
      $admin->attachPermission($editar_todas_tarefas);
      $admin->attachPermission($remover_todas_tarefas);
    }
}
