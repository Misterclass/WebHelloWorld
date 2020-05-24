@extends('layouts.layout')

@section('content')
  <div class="limitation">
    <div id="students-group" class = "flex-between">
      <div id="students-list">
        <div class="student-card">
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
        </div>
        <div class="student-card">
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
        </div>
      </div>
      <div id="student-tasks">
        <div class="student-info">
          <div class="user-avatar"></div>
          <p>Кто-то Тамович</p>
        </div>
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
    </div>
  </div>
@endsection
