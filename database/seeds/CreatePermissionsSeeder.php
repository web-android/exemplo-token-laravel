<?php

use App\Permission;
use Illuminate\Database\Seeder;

class CreatePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $criar_tarefa = new Permission();
      $criar_tarefa->name = "criar-tarefa";
      $criar_tarefa->display_name = "Criar Tarefa";
      $criar_tarefa->description = "Criador da Tarefa" ;
      $criar_tarefa->save();

      $ler_tarefa = new Permission();
      $ler_tarefa->name = "ler-tarefa";
      $ler_tarefa->display_name = "Ler Tarefa criada";
      $ler_tarefa->description = "Ler Tarefa criada" ;
      $ler_tarefa->save();

      $editar_tarefa = new Permission();
      $editar_tarefa->name = "editar-tarefa";
      $editar_tarefa->display_name = "Editar Tarefa criada";
      $editar_tarefa->description = "Editar Tarefa criada" ;
      $editar_tarefa->save();

      $remover_tarefa = new Permission();
      $remover_tarefa->name = "remover-tarefa";
      $remover_tarefa->display_name = "Remover Tarefa criada";
      $remover_tarefa->description = "Remover Tarefa criada" ;
      $remover_tarefa->save();

      $editar_todas_tarefas = new Permission();
      $editar_todas_tarefas->name = "editar-todas-tarefas";
      $editar_todas_tarefas->display_name = "Editar Qualquer Tarefa";
      $editar_todas_tarefas->description = "Editar Qualquer Tarefa" ;
      $editar_todas_tarefas->save();

      $remover_todas_tarefas = new Permission();
      $remover_todas_tarefas->name = "remover-todas-tarefas";
      $remover_todas_tarefas->display_name = "Remover Qualquer Tarefa";
      $remover_todas_tarefas->description = "Remover Qualquer Tarefa" ;
      $remover_todas_tarefas->save();

    }
}
