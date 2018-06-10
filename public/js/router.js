Todos.Router.map(function () {
  this.resource('todos', { path: '/' }, function () {
    this.route('active');
    this.route('completed');
  });
});



Todos.TodosRoute = Ember.Route.extend({
  model: function () {
    let todoss = this.store.find('todo');
    console.log(todoss);
    return todoss;
  }
});


Todos.TodosCompletedRoute = Ember.Route.extend({
  model: function () {
    return this.store.filter('todo', function (todo) {
      return todo.get('isCompleted');
    });
  },
  renderTemplate: function (controller) {
    this.render('todos/index', { controller: controller });
  }
});


Todos.TodosActiveRoute = Ember.Route.extend({
  model: function () {
    return this.store.filter('todo', function (todo) {
      return !todo.get('isCompleted');
    });
  },
  renderTemplate: function (controller) {
    this.render('todos/index', { controller: controller });
  }
});