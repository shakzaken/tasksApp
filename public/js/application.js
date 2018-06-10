

window.Todos = Ember.Application.create();

/*
Todos.ApplicationAdapter = DS.LSAdapter.extend({
  namespace: 'todos-emberjs'
});
*/
/*
Todos.ApplicationAdapter = DS.RESTAdapter.extend({
  namespace: 'tasksapp/public/api'
});
*/
Todos.TodoAdapter = DS.RESTAdapter.extend({
  namespace: 'tasksapp/public/api'
});

Todos.ServiceSerializer = DS.JSONSerializer.extend({
  serialize: function (record, options) {
    var json = this._super.apply(this, arguments); // Get default serialization

    json.id = record.id;  // tack on the id

    return json;
  }
});



