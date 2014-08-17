ADM.app = new ADM.App

ADM.app.events.on 'router:init:end', ->
  Backbone.history.start
    pushState: true

ADM.app.init()

$(document).on 'click', 'a[data-backbone]', (e) ->
  e.preventDefault()
  Backbone.history.navigate($(e.currentTarget).attr('href'));

$ -> ADM.app.events.t 'dom:onload'