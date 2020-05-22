<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hello World</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body>
      <header>
        <div class="limitation">
          <a href="#" id = "header-logo">
            <h3>Hello World!</h3>
          </a>

          <div class="user-avatar"></div>

          <nav class = "flex-between">
            <a href="#" id = "list-icon"></a>
            <a href="#" id = "group-icon"></a>
            <a href="#" id = "logout-icon"></a>
          </nav>
        </div>
      </header>

      <main>
        @yield('content')
      </main>
    </body>
</html>
