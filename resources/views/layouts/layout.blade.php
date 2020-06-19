<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Hello World</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Jquery CDN -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>
      <script src="{{ asset('js/script.js') }}" charset="utf-8"></script>

    </head>
    <body>
      <header>
        <div class="limitation">
          <div class="mobile-menu">

          </div>

          <a href="#" id = "header-logo">
            <h3>Hello World!</h3>
          </a>

          <div class="user-avatar"></div>

          <nav class = "flex-between">
            <a href="{{ route('home') }}" id = "list-icon"></a>
            <a href="{{ route('students') }}" id = "group-icon"></a>
            <a href="{{ route('index') }}" id = "logout-icon"></a>
          </nav>
        </div>
      </header>

      <main>
        <ul class = "mobile-nav">
          <a href="#"><li>Мои задачи</li></a>
          <a href="#"><li>Добавить задачу</li></a>
          <a href="#"><li>Другие студенты</li></a>
          <a href="#"><li>Выйти</li></a>
        </ul>
        @yield('content')
      </main>
    </body>
</html>
