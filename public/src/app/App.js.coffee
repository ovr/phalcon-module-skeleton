
class BBNS.App

  events: _.extend(BBNS.Events, Backbone.Events)

  init: ->
    @events.t 'init:start'
    @events.on 'dom:onload', @dom_onload, this

    @events.on 'init:dom:end', ->
      @events.t 'init:end'
    , this

  dom_onload: ->
