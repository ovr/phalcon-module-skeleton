
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

  products: ->
    @pageHeader.text 'Products'