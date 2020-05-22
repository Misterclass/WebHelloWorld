<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hello World</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
            <form class="container-form" id = "login-form" action="" method="post">
              <h2>Мы рады, что ты вернулся!</h2>
              <p>Новые задачи уже ждут тебя!</p>
              <div class="form-inputs">
                <input type="text" name="email" placeholder = "Электронная почта или логин">
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
