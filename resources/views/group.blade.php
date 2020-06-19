@extends('layouts.layout')

@section('content')

<script>

  function GenerateHtml(data)
  {
    users = JSON.parse(data);

    var studentsList = document.querySelector('#students-list');

    users.forEach((item, i) =>
    {
      let html = GetHtmlUser(item);
      studentsList.appendChild(html);
    });
  }

  function GetHtmlUser(user)
  {
    let card = document.createElement('div');
    card.className = "student-card";

    // let studentHeader = document.createElement('h2');
    // studentHeader.textContent = user.username;

    let studentHeader = document.createElement('div');
    studentHeader.className = "student-card-header";

    let studentAvatar = document.createElement('div');
    studentAvatar.className = "user-avatar";

    let studentHeaderText = document.createElement('p');
    studentHeaderText.textContent = user.username

    let studentClipboards = document.createElement('div');
    studentClipboards.className = "clipboards";

    studentHeader.appendChild(studentAvatar);
    studentHeader.appendChild(studentHeaderText);
    studentHeader.appendChild(studentClipboards);

    let studentTasks = document.createElement('div');
    studentTasks.className = "student-card-tasks";

    let studentTasksList = document.createElement('div');
    studentTasksList.className = "tasks-list";

    let userSnippets = user.snippets;

    userSnippets.forEach((item, i) =>
    {
      studentTasksList.appendChild(GetHtmlSnippet(item))
    });

    studentTasks.appendChild(studentTasksList);
    card.appendChild(studentHeader);
    card.appendChild(studentTasks);

    return card;
  }

  function GetHtmlSnippet(snippet)
  {
    let task = document.createElement('div');
    task.className = "student-task";

    //Create content
    let taskContent = document.createElement('div');
    taskContent.className = "task-content";

    let taskStatusClass = "task-" + snippet.linenos;
    let taskStatus = document.createElement('div');
    taskStatus.className = "task-status";
    taskStatus.classList.add(taskStatusClass);

    let taskHeader = document.createElement('p');
    taskHeader.textContent = snippet.title;

    taskContent.appendChild(taskHeader);

    //Create avatar
    let taskLang = document.createElement('div');
    taskLang.className = "task-lang";

    task.appendChild(taskLang);
    task.appendChild(taskContent);
    task.appendChild(taskStatus);

    return task;
  }

  function AddTasksToggle()
  {
    $buttons = $(".student-card");
    $buttons.on("mouseover", function()
    {
      $(event.currentTarget).addClass("student-card-open")
    });

    $buttons.on("mouseout", function()
    {
      $(event.currentTarget).removeClass("student-card-open")
    });
  }

  function AddTasksClick()
  {
    $buttons = $(".student-card");
    $buttons.on("click", function(event)
    {
      $card = $(event.currentTarget);
      let $userName = $card.find(".student-card-header p").text();
      RenderUserInformation($userName);
    });
  }

  function RenderUserInformation(userName)
  {
    $userCard = $("#student-tasks");
    $userCardName = $userCard.find(".student-info p");
    $userCardName.text(userName);

    let parent = $userCard.find(".tasks-list");

    //Get our snippets
    $.ajax({
      url: "http://127.0.0.1:8000/users/snippets/" + userName,
      type: "GET",
      headers:
      {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data)
      {
        let snippets = JSON.parse(data);
        GenerateCardHtml(parent,snippets);
      },
    });
  }

  function GenerateCardHtml($parent, data)
  {
    $parent.find(".student-task").remove();

    data.forEach((item, i) =>
    {
      let html = GetHtmlSnippet(item);
      $parent.append(html);
    });

  }

  $(document).ready(function()
  {
    $.ajax({
      url:"{{ route('users.list') }}",
      type: "GET",
      headers:
      {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data)
      {
        GenerateHtml(data);
        AddTasksToggle();
        AddTasksClick();
      },
    });
  })
</script>

  <div class="limitation">
    <div id="students-group" class = "flex-between">
      <div id="students-list">
        <!-- <div class="student-card student-card-open">
          <div class="student-card-header">
            <div class="user-avatar"></div>
            <p>Кто-то Тамович</p>
            <div class="clipboards"></div>
          </div>
          <div class="student-card-tasks">
            <div class="tasks-list">
              <div class="student-task">
                <div class="task-lang"></div>
                <div class="task-content">
                  <p>Калькулятор</p>
                </div>
                <div class="task-status task-done">

                </div>
              </div>

              <div class="student-task">
                <div class="task-lang"></div>
                <div class="task-content">
                  <p>Калькулятор</p>
                </div>
                <div class="task-status task-unresolved">

                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <div id="student-tasks">
        <div class="student-info">
          <div class="user-avatar"></div>
          <p></p>
        </div>
        <div class="tasks-list">
          <!-- <div class="student-task">
            <div class="task-lang"></div>
            <div class="task-content">
              <p>Калькулятор</p>
            </div>
            <div class="task-status task-done">

            </div>
          </div>

          <div class="student-task">
            <div class="task-lang"></div>
            <div class="task-content">
              <p>Калькулятор</p>
            </div>
            <div class="task-status task-unresolved">

            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
@endsection
