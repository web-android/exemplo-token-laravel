<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {




    //Criar usuario
    Route::post('/criar_usuario', 'CreateUserController@store');
    //TODO - Criar rota para atualizar dados do usuário


    //Rotas de Autenticação Web - Serão removidas
    // Route::auth();
    // Route::get('/get_token', function (Request $request) {
    //     return response()->json(['token' => $request->user()->api_token]);
    // });
    // Route::get('/', function () {
    //     return view('welcome');
    // })->middleware('guest');
});



Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {

  //Tarefas
  Route::get('/tasks', 'TaskController@index');
  Route::post('/task', 'TaskController@store');
  Route::delete('/task/{task}', 'TaskController@destroy');
  Route::patch('/task/{task}', 'TaskController@update');

  //Roles
  Route::get('usuario/roles', 'RoleController@index');
  Route::post('usuario/adicionar_role/{role}', 'RoleController@store');
  Route::delete('usuario/remover_role/{role}', 'RoleController@destroy');

  //Permissoes
  Route::get('roles/{role_name}/permissoes', 'PermissionController@index');
  Route::post('roles/{role_name}/adicionar_permissao/{permissao_id}', 'PermissionController@store');
  Route::delete('roles/{role_name}/remover_permissao/{permissao_id}', 'PermissionController@destroy');
});
