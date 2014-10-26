
class ADM.App

  events: _.extend(ADM.Events, Backbone.Events)

  initialize: ->
    @events.t 'init:start'
    @events.on 'dom:onload', @dom_onload, this

    @events.on 'init:dom:end', ->
      @events.t 'init:end'
    , this

    @pageHeader = $('.page-header');
    @router = new ADM.Router

    @events.t 'init:dom:end'

  dom_onload: ->
    console.log 'dom_onload'

  dashboard: ->
    console.log 'ADM.App dashboard'
    @pageHeader.text 'Dashboard'

  users: ->
    console.log 'AMD.App.users();'

    @pageHeader.text 'Users'

    users = new Users();
    users.fetch();

    grid = new Backgrid.Grid({
      columns: [
        {
          name: "id",
          label: "ID",
          cell: "string"
        },
        {
          name: "firstname",
          label: "Firstname",
          cell: "string"
        },
        {
          name: "lastname",
          label: "Lastname",
          cell: "string"
        }
      ],
      collection: users
    });

    $('#container').append(grid.render().el);
    console.log(users);

  products: ->
    @pageHeader.text 'Products'