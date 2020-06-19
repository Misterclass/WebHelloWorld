@extends('layouts.layout')

@section('content')
  <div class="limitation">
    <form class="container-form" id = "snippet-form" action="{{ route('snippets.update', $snippet->id) }}" method="post">
      @csrf
      <div class="form-inputs flex-between">
          @php
           $languages = array('javascript', 'cpp', 'python', 'html', 'php');
           $results = array('done', 'unresolved');
          @endphp
        <input type="text" name="name" placeholder = "Название проекта" autocomplete="off"
        value = "{{ $snippet->title }}">
        <select class="prog-lang" name="prog-lang">
          @foreach ($languages as $value)
            @if ($value == $snippet->language)
              <option value="{{ $value }}" selected>{{ ucfirst($value) }}</option>
            @else
              <option value="{{ $value }}">{{ ucfirst($value) }}</option>
            @endif
          @endforeach
          <!-- <option value="javascript">Javascript</option>
          <option value="cpp">C++</option>
          <option value="python">Python</option>
          <option value="html">HTML</option>
          <option value="php">PHP</option> -->
        </select>
      </div>
      <div class="form-inputs">
        <textarea name="description" rows="4" cols="80" placeholder="Описание задачи">{{ $snippet->description }}</textarea>
      </div>
      <div class="form-inputs">
        <textarea name="code" rows="8" cols="80" placeholder="Введите код...">{{ $snippet->code }}</textarea>
      </div>
      <div class="form-buttons flex-around">
        <div class = "task-status">
          <input type="checkbox" name="task-status" value="unresolved" id = "task-status">
          <label for="task-status">
            <!-- For correct task status rendering from CSS -->
            <span></span>
          </label>
        </div>
        <input type="submit" value="Сохранить" class = "btn-pink" id = "task-submit">
        <input type="reset" value="Отмена" class = "btn-blue">
      </div>
    </form>
  </div>
@endsection
