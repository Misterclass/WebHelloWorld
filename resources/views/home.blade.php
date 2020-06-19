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

    function GetHtmlSnippetMobile(snippet)
    {
      let link = document.createElement('a');
      link.setAttribute("href", "http://127.0.0.1:8000/snippets/" + snippet.id);

      let task = document.createElement('div');
      task.className = "task-mobile";

      let taskStatusClass = "task-" + snippet.linenos;
      let taskStatus = document.createElement('div');
      taskStatus.className = "task-status";
      taskStatus.classList.add(taskStatusClass);

      let taskDesc = document.createElement('p');
      taskDesc.textContent = snippet.description;

      //Create content
      let taskContent = document.createElement('div');
      taskContent.className = "task-content";

      let taskHeader = document.createElement('h3');
      taskHeader.textContent = snippet.title;

      let taskAuthor = document.createElement('p');
      let user = JSON.parse(sessionStorage.getItem('token'));
      taskAuthor.textContent = "Автор: " + user.username;

      taskContent.appendChild(taskHeader);
      taskContent.appendChild(taskAuthor);

      //Create avatar
      let taskLang = document.createElement('div');
      taskLang.className = "task-lang";

      let flex = document.createElement('div');
      flex.className = "flex";

      flex.appendChild(taskLang);
      flex.appendChild(taskContent);

      task.appendChild(flex);
      task.appendChild(taskDesc);
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
            let htmlMobile = GetHtmlSnippetMobile(item);
            taskList.appendChild(html);
            taskList.appendChild(htmlMobile);
          });

        },
      });
    })
  </script>

  <div class="limitation">
    <div class="tasks-list">
    </div>
    <div class="flex-center">
      <a href="{{ route('snippets.create') }}">
        Создать задачу
      </a>
    </div>
  </div>
@endsection
