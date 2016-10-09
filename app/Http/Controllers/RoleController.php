<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Auth;
use App\Role;
use App\User;


class RoleController extends Controller {

  protected $user;



  public function __construct()  {
    $this->user =  Auth::guard('api')->user();;

  }

  public function index(Request $request)
  {
      return response()->json(['roles' => $this->user->roles()]);

  }


  public function store(Request $request, Role $role)  {
      if(! $this->user->hasRole($role->name)){
        $this->user->attachRole($role);
      }
      return response()->json(['roles' => $this->user->roles()->get()]);
  }


  public function destroy(Request $request, Role $role)  {
    if($this->user->hasRole($role->name)){
      $this->user->detachRole($role);
    }
    return response()->json(['roles' => $this->user->roles()->get()]);
  }
}
