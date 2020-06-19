<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Snippets;


class SnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      session_start();
      $userId = $_SESSION['token'];

      if (isset($_SESSION['token']))
      {
        $userId = $_SESSION['token'];
        $user = User::find($userId);
        return view('snippet.create', ["user" => $user]);
      }

      return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      session_start();
      $userId = $_SESSION['token'];

      if (isset($_SESSION['token']))
      {
        $userId = $_SESSION['token'];
        $user = User::find($userId);
        $this->StoreSnippet($user);
        return "Success!";
      }

      return "Error";
    }

    private function StoreSnippet($user)
    {
      $snippet = new Snippets();

      $snippet->owner = $user->id;

      $snippet->title = $_POST["name"];

      $snippet->code =  (isset($_POST["code"]))
                          ? $_POST["code"]
                          : "No code";

      $snippet->description = $_POST['description'];
      $snippet->linenos = (isset($_POST['task-status'])) ? "done" : "unresolved";
      $snippet->language = $_POST['prog-lang'];

      $snippet->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      session_start();
      $userId = $_SESSION['token'];

      if (isset($_SESSION['token']))
      {
        $userId = $_SESSION['token'];
        $user = User::find($userId);

        $snippet = Snippets::find($id);

        $data =
        [
          "user" => $user,
          "snippet" => $snippet
        ];

        return view('snippet.show', $data);
      }

      return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $snippet = Snippets::find($id);

      session_start();
      $userId = $_SESSION['token'];

      if($snippet && isset($_SESSION['token']))
      {
        $userId = $_SESSION['token'];
        $user = User::find($userId);

        $data =
        [
          'snippet' => $snippet,
          'user' => $user
        ];
        return view('snippet.edit', $data);
      }

      return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $snippet = Snippets::find($id);

      if ($snippet)
      {
        $snippet->title = $request->input('name');

        $code = $request->input('code');
        $snippet->code =  ($code)
                            ? $code
                            : "No code";

        $snippet->description = $request->input('description');
        $snippet->linenos = ($request->input('task-status')) ? "done" : "unresolved";
        $snippet->language = $request->input('prog-lang');

        $snippet->save();
      }

      return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $snippet = Snippets::find($id);
      $snippet->delete();

      //Come to news first page
      return redirect()->route('home');
    }
}
