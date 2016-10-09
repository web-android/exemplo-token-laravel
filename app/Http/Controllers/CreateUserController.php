<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;
use App\User;
use App\Role;

class CreateUserController extends Controller {

  public function store(CreateUserRequest $request)  {
    $data = $request->only("name", "email", "password");
    $user =  User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'api_token' => str_random(60),
    ]);
    $role_criador = Role::where("name", "criador")->first();
    $user->attachRole($role_criador);
    return response()->json(["usuario" => $user->api_token]);
  }
}
