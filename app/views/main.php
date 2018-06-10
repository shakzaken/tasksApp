<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
<script type="text/x-handlebars" data-template-name="todos">
    <section id="todoapp">
      <header id="header">
        <h1>משימות</h1>
          {{input
            type="text"
            id="new-todo"
            placeholder="הוסף משימה"
            value=newTitle
            action="createTodo"}}
      </header>
  <section id="main">
    {{outlet}}
    {{input type="checkbox" id="toggle-all" checked=allAreDone}}
  </section>

  <footer id="footer">
    <ul id="filters">
      <li style="margin-left:10px;"> 
         <strong>לסיום {{remaining}}</strong>
      </li>
      <li style="margin-left:10px;">
        <strong>הושלמו {{completed}}</strong>   
      </li>
      <li style="margin-left:10px;">
        <strong> סה"כ {{all}}</strong> 
      </li>
    </ul>
  </footer>
  </section>

  <footer id="info">
    <p>בכדי לערוך משימה, לחץ לחיצה כפולה.</p>
  </footer>
  </script>


  <script type="text/x-handlebars" data-template-name="todos/index">
    <ul id="todo-list">
      {{#each todo in model itemController="todo"}}
        <li {{bind-attr class="todo.isCompleted:completed todo.isEditing:editing"}}>

            {{#if todo.isEditing}}
              {{edit-todo class="edit" value=todo.title focus-out="acceptChanges"
                                    insert-newline="acceptChanges"}}
            {{else}}
            {{input type="checkbox" checked=todo.isCompleted class="toggle"}}
            <label {{action "editTodo" on="doubleClick"}}>{{todo.title}}</label>
            <button {{action "removeTodo"}} class="destroy"></button>
          {{/if}}
        </li>
      {{/each}}
    </ul>
  </script>


  <script src="js/libs/jquery-1.11.2.min.js"></script>
  <script src="js/libs/handlebars-v1.3.0.js"></script>
  <script src="js/libs/ember.js"></script>
  <script src="js/libs/ember-data.js"></script>
  <script src="js/libs/localstorage_adapter.js"></script>
  <script src="js/application.js"></script>
  <script src="js/router.js"></script>
  <script src="js/models/todo.js"></script>
  <script src="js/controllers/todos_controller.js"></script>
  <script src="js/controllers/todo_controller.js"></script>
  <script src="js/views/edit_todo_view.js"></script>
</body>
</html>
