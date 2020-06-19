<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Snippets;


class HomeController extends Controller
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
    public function index()
    {
      return view('home');
    }

    public function getSnippets()
    {
      session_start();
      $userId = $_SESSION['token'];

      if (isset($_SESSION['token']))
      {
        $userId = $_SESSION['token'];
        $user = User::find($userId);

        $snippets = $this->GetUserSnippets($user);
        return json_encode($snippets);
      }

      return "Error";
    }

    private function GetUserSnippets($user)
    {
      $snippets = Snippets::where('owner', $user->id)->get();
      return $snippets;
    }
}
