@extends('layouts.layout')

@section('content')

  <script>

    function GetHtmlSnippet(snippet)
    {
      let link = document.createElement('a');
      link.setAttribute("href", "http://127.0.0.1:8000/snippets/" + snippet.id);

      let task = document.createElement('div');
      task.className = "task";

      //Create content
      let taskContent = document.createElement('div');
      taskContent.className = "task-content";

      let taskStatusClass = "task-" + snippet.linenos;
      let taskStatus = document.createElement('div');
      taskStatus.className = "task-status";
      taskStatus.classList.add(taskStatusClass);

      let taskHeader = document.createElement('h3');
      taskHeader.textContent = snippet.title;

      let taskAuthor = document.createElement('p');
      let user = JSON.parse(sessionStorage.getItem('token'));
      taskAuthor.textContent = "Автор: " + user.username;

      let taskDesc = document.createElement('p');
      taskDesc.textContent = snippet.description;

      taskContent.appendChild(taskHeader);
      taskContent.appendChild(taskAuthor);
      taskContent.appendChild(taskDesc);

      //Create avatar
      let taskLang = document.createElement('div');
      taskLang.className = "task-lang";

      task.appendChild(taskLang);
      task.appendChild(taskContent);
      task.appendChild(taskStatus);

      link.appendChild(task);

      return link;
    }

    $(document).ready(function()
    {
      $.ajax({
        url:"{{ route('home.snippets') }}",
        type: "GET",
        headers:
        {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
          snippets = JSON.parse(data);

          var taskList = document.querySelector('.tasks-list');

          snippets.forEach((item, i) =>
          {
            let html = GetHtmlSnippet(item);
            // let htmlMobile = GetHtmlSnippetMobile(item);
            taskList.appendChild(html);
          });

        },
      });
    })
  </script>

  <div class="limitation">
    <div class="tasks-list">
        <!-- <div class="task">
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
        </div> -->
        <!-- <div class="task-mobile">
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
          <div class="task-status task-unresolved">

          </div>
        </div> -->
    </div>
    <div class="flex-center">
      <a href="{{ route('snippets.create') }}">
        Создать задачу
      </a>
    </div>
  </div>
@endsection
