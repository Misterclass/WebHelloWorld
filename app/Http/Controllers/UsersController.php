<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Snippets;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
      session_start();
      $userId = $_SESSION['token'];

      if (isset($_SESSION['token']))
      {
        $userId = $_SESSION['token'];
        $user = User::find($userId);
        $showUser = User::find($id);

        $showUser->snippets = Snippets::where('owner', $showUser->id)->paginate(4);

        $data =
        [
          'currentUser' => $showUser
        ];


        return view('student', $data);
      }

      return redirect('/');
    }

    public function getUserSnippets($userName)
    {
      $showUser = User::where('username', $userName)->first();
      $snippets = Snippets::where('owner', $showUser->id)->get();
      return json_encode($snippets);
    }
}
