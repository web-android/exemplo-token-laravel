<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Auth;
use App\Role;
use App\User;
use App\Permission;


class PermissionController extends Controller
{
  protected $user;



  public function __construct()  {
    $this->user =  Auth::guard('api')->user();;

  }

  public function index(Request $request, $role_name)  {
    $role = Role::where("name", $role_name)->first();
    return response()->json(['permissions' => $role->perms()->get()]);
  }


  public function store(Request $request, $role_name, $permissao_id)  {
    if($this->user->hasRole('admin')){
      $role = Role::where("name", $role_name)->first();
      $permissao = Permission::find($permissao_id);
      $role->attachPermission($permissao);
      return response()->json(['permissions' => $role->perms()->get()]);
    }
      return response()->json(['erro' => 'Somente admin pode adicionar permissões'], 401);
  }


  public function destroy(Request $request, $role_name, $permissao_id)  {
    if($this->user->hasRole('admin')){
      $role = Role::where("name", $role_name)->first();
      $permissao = Permission::find($permissao_id);
      $role->detachPermission($permissao);
      return response()->json(['permissions' => $role->perms()->get()]);
    }
    return response()->json(['erro' => 'Somente admin pode remover permissões'], 401);
  }
}
