class window.ADM

class ADM.App

  events: _.extend(ADM.Events, Backbone.Events)

  init: ->
    @events.t 'init:start'
    @events.on 'dom:onload', @dom_onload, this

    @events.on 'init:dom:end', ->
      @events.t 'init:end'
    , this

  dom_onload: ->
    console.log 'dom_onload'

ADM.app = new ADM.App
ADM.app.events.on 'router:init:end', -> Backbone.history.start pushState: true
ADM.app.init()

$ -> BBNS.app.events.t 'dom:onload'