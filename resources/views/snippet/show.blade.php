@extends('layouts.layout')

@section('content')
  <div class="limitation">
    <div id = "current-task">
      <div class="task">
        <div class="task-lang"></div>
        <div class="task-content">
          <h3>{{ $snippet->title }}</h3>
          <p>Автор: {{ $user->username }}</p>
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
      <div class="task-buttons flex-betweem">
      <a href="{{ route('snippets.edit', $snippet->id) }}">Редактировать</a>
      <a href="{{ route('snippets.delete', $snippet->id) }}">Удалить</a>
    </div>
    </div>
  </div>
@endsection
