<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login()
    {
      $authUserName = $_POST["name"];
      $authUserPwd = $_POST["password"];
      $user = User::where('username', $authUserName)->first();

      if ($user && $user->password == $authUserPwd)
      {
        $this->SaveUserName($user);
        return json_encode($user);
      }

      //Redirect if no login
      return "Error";
    }

    private function SaveUserName($user)
    {
      session_start();
      $_SESSION['token'] = $user->id;
    }
}
