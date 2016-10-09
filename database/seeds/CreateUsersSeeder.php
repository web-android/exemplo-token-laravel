<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = "usuario normal";
      $user->email = "usuarionormal@example.com";
      $user->password = bcrypt('123123') ;
      $user->api_token = str_random(60);
      $user->save();

      $admin = new User();
      $admin->name = "admin";
      $admin->email = "admin@example.com";
      $admin->password = bcrypt('123123') ;
      $admin->api_token = str_random(60);
      $admin->save();


      $moderador = new User();
      $moderador->name = "moderador";
      $moderador->email = "moderador@example.com";
      $moderador->password = bcrypt('123123') ;
      $moderador->api_token = str_random(60);
      $moderador->save();
    }
}
