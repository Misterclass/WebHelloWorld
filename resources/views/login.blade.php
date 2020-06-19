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

      <script>
        $(document).ready(function()
        {
          $loginForm = $("#login-form");

          $loginForm.on("submit", function(event)
          {
            event.preventDefault();

            $.ajax({
              url:"{{ route('login') }}",
              type: "POST",
              data: $loginForm.serialize(),
              headers:
              {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data)
              {
                sessionStorage.setItem('token', data);
                window.location.href = "http://127.0.0.1:8000/home";
              },
            });
          })
        })
      </script>
    </head>
    <body>
      <div id="loginBG">
        <header>
          <div class="limitation">
            <a href="#" id = "header-logo">
              <h3>Hello World!</h3>
            </a>
          </div>
        </header>

        <main>
          <div class="limitation flex-row-end">
            <form class="container-form" id = "login-form" action="{{ route('login') }}" method="post">
              @csrf
              <h2>Мы рады, что ты вернулся!</h2>
              <p>Новые задачи уже ждут тебя!</p>
              <div class="form-inputs">
                <input type="text" name="name" placeholder = "Логин">
                <input type="password" name="password" placeholder = "Пароль">
              </div>
              <div class="form-buttons">
                <input type="submit" value="Авторизоваться" class = "btn-pink">
              </div>
            </form>
          </div>
        </main>
      </div>
    </body>
</html>
