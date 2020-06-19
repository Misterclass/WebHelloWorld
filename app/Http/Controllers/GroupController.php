<?php

namespace App\Http\Controllers;
use App\User;
use App\Snippets;

use Illuminate\Http\Request;

class GroupController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('group');
  }

  public function getUsers()
  {
    session_start();
    $userId = $_SESSION['token'];

    if (isset($_SESSION['token']))
    {
      $userId = $_SESSION['token'];
      $user = User::find($userId);

      $users = User::where('id', '<>', $user->id)->get();

      for ($i=0; $i < count($users); $i++)
      {
        $users[$i]->snippets = Snippets::where('owner', $users[$i]->id)->get();
      }

      return json_encode($users);
    }
    return "Error";
  }
}
