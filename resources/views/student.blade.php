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
        <h3>{{ $currentUser->username }}</h3>
        <h3>Звание: <i>Студент</i></h3>
        <p>
          {{ $currentUser->description }}
        </p>
      </div>
    </div>
    <div class="tasks-list">
      <h2 class = "text-center">Список задач</h2>
      @foreach($currentUser->snippets as $snippet)
      <div class="task">
        <div class="task-lang"></div>
        <div class="task-content">
          <h3>{{ $snippet->title }}</h3>
          <p>Автор: {{ $currentUser->username }}</p>
          <p>
            {{ $snippet->description }}
          </p>
        </div>
        @if ($snippet->linenos == "done")
          <div class="task-status task-done">

          </div>
        @else
        <div class="task-status task-unresolved">

        </div>
        @endif
      </div>
      <div class="task-mobile">
        <div class="flex">
          <div class="task-lang"></div>
          <div class="task-content">
            <h3>{{ $snippet->title }}</h3>
            <p>Автор: {{ $currentUser->username }}</p>
          </div>
        </div>
        <p>
          {{ $snippet->description }}
        </p>
        @if ($snippet->linenos == "done")
          <div class="task-status task-done">

          </div>
        @else
        <div class="task-status task-unresolved">

        </div>
        @endif
      </div>
      @endforeach
@endsection
