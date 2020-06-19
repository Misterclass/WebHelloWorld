@extends('layouts.layout')

@section('content')

  <script>
    $(document).ready(function()
    {
      $snippetForm = $("#snippet-form");

      $snippetForm.on("submit", function(event)
      {
        event.preventDefault();

        $.ajax({
          url:"{{ route('snippets.store') }}",
          type: "POST",
          data: $snippetForm.serialize(),
          headers:
          {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data)
          {
            alert(data);
          },
        });
      })
    })
  </script>

  <div class="limitation">
    <form class="container-form" id = "snippet-form" action="" method="post">
      <div class="form-inputs flex-between">
        <input type="text" name="name" placeholder = "Название проекта" autocomplete="off">
        <select class="prog-lang" name="prog-lang">
          <option value="javascript">Javascript</option>
          <option value="cpp">C++</option>
          <option value="python">Python</option>
          <option value="html">HTML</option>
          <option value="php">PHP</option>
        </select>
      </div>
      <div class="form-inputs">
        <textarea name="description" rows="4" cols="80" placeholder="Описание задачи"></textarea>
      </div>
      <div class="form-inputs">
        <textarea name="code" rows="8" cols="80" placeholder="Введите код..."></textarea>
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
