
class ADM.App

  events: _.extend(ADM.Events, Backbone.Events)

  init: ->
    @events.t 'init:start'
    @events.on 'dom:onload', @dom_onload, this

    @events.on 'init:dom:end', ->
      @events.t 'init:end'
    , this

    @router = new ADM.Router

    @events.t 'init:dom:end'

  dom_onload: ->
    console.log 'dom_onload'

  dashboard: ->
    console.log 'ADM.App dashboard'