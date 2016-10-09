<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;


    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->tasks = $tasks;
        $this->user =  Auth::guard('api')->user();;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return response()->json(['tasks' => $this->tasks->forUser($this->user)]);

    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        if($this->user->can('criar-tarefa')){
          $this->user->tasks()->create([
              'name' => $request->name,
          ]);
          return response()->json(['status' => 'Tarefa criada com sucesso'], 201);
        }
        else{
          return response()->json(['erro' => 'Você não possui permissões suficientes'], 401);
        }

    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task) {
      //poderia ter utilizado um OR, mas quis simplificar para ilustrar
      if($this->user->id === $task->user_id){
        if($this->user->can('remover-tarefa')){
          $task->delete();
          return response()->json(['status' => 'Tarefa removida com sucesso'], 200);
        }
      }else if($this->user->can('remover-todas-tarefas')){
          $task->delete();
          return response()->json(['status' => 'Tarefa removida com sucesso'], 200);
      }
      else{
          return response()->json(['erro' => 'Você não possui permissões suficientes'], 401);
      }
    }

    public function update(Request $request, Task $task) {
      $params = $request->only("name");
      //poderia ter utilizado um OR, mas quis simplificar para ilustrar
      if($this->user->id === $task->user_id){
        if($this->user->can('editar-tarefa')){
          $task->name = $params["name"];
          $task->save();
          return response()->json(['status' => 'Tarefa editada com sucesso'], 200);
        }
      }else if($this->user->can('editar-todas-tarefas')){
          $task->name = $params["name"];
          $task->save();
          return response()->json(['status' => 'Tarefa editada com sucesso'], 200);
      }
      else{
          return response()->json(['erro' => 'Você não possui permissões suficientes'], 401);
      }
    }


}
