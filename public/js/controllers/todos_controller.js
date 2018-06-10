Todos.TodosController = Ember.ArrayController.extend({
  actions: {
    createTodo: function () {
      var title = this.get('newTitle');
      if (!title.trim()) { return; }

      var todo = this.store.createRecord('todo', {
        title: title,
        isCompleted: false
      })

      this.set('newTitle', '');
      todo.save()
        .catch(err => console.log(err));
    },
  },
  remaining: function () {
    return this.filterBy('isCompleted', false).get('length');
  }.property('@each.isCompleted'),

  all: function () {
    return this.get('length');
  }.property('@each.isCompleted'),

  hasCompleted: function () {
    return this.get('completed') > 0;
  }.property('completed'),

  completed: function () {
    return this.filterBy('isCompleted', true).get('length');
  }.property('@each.isCompleted'),

  inflection: function () {
    var remaining = this.get('remaining');
    return remaining === 1 ? 'item' : 'items';
  }.property('remaining'),

});

