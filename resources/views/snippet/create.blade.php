@extends('layouts.layout')

@section('content')
  <div class="limitation">
    <form class="container-form" id = "snippet-form" action="" method="post">
      <div class="form-inputs flex-between">
        <input type="text" name="name" placeholder = "Название проекта" autocomplete="off">
        <select class="prog-lang" name="prog-lang">
          <option value="js">Javascript</option>
          <option value="cpp">C++</option>
          <option value="python">Python</option>
          <option value="html">HTML</option>
          <option value="php">PHP</option>
        </select>
      </div>
      <div class="form-inputs">
        <textarea name="name" rows="8" cols="80" placeholder="Введите код..."></textarea>
      </div>
      <a href="#" id="task-content-link">
        <p>Добавить описание задачи</p>
      </a>
      <div class="form-buttons flex-around">
        <div class = "task-status">
          <span>Статус задачи:</span>
          <input type="checkbox" name="status" value="unresolved" id = "task-status">
          <label for="task-status">
            <!-- For correct task status rendering from CSS -->
            <span></span>
          </label>
        </div>
        <input type="submit" value="Авторизоваться" class = "btn-pink" id = "task-submit">
        <input type="reset" value="Отмена" class = "btn-blue">
      </div>
    </form>
  </div>
@endsection
