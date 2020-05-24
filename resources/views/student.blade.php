@extends('layouts.layout')

@section('content')
  <div class="limitation">
    <div id = "student-information">
      <div id = "student-back">
        <a href="#">
          <div class = "back"></div>
        </a>
      </div>
      <div class="user-avatar"></div>
      <div id="student-content">
        <h3>Кто-то Тамович</h3>
        <h3>Звание: <i>Студент</i></h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>
    <div class="tasks-list">
      <h2 class = "text-center">Список задач</h2>
      <div class="task">
        <div class="task-lang"></div>
        <div class="task-content">
          <h3>Калькулятор</h3>
          <p>Автор: Кто-то Тамович</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
        <div class="task-status task-done">
          
        </div>
      </div>
      <div class="task">
        <div class="task-lang"></div>
        <div class="task-content">
          <h3>Калькулятор</h3>
          <p>Автор: Кто-то Тамович</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
        <div class="task-status task-unresolved">

        </div>
      </div>
      <div class="task-mobile">
        <div class="flex">
          <div class="task-lang"></div>
          <div class="task-content">
            <h3>Калькулятор</h3>
            <p>Автор: Кто-то Тамович</p>
          </div>
        </div>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat.
        </p>
        <div class="task-status task-done">

        </div>
      </div>
<div class="task-mobile">
        <div class="flex">
          <div class="task-lang"></div>
          <div class="task-content">
            <h3>Калькулятор</h3>
            <p>Автор: Кто-то Тамович</p>
          </div>
        </div>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat.
        </p>
        <div class="task-status task-unresolved">

        </div>
      </div>
    </div>
  </div>
@endsection
