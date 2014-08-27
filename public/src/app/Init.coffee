ADM.app = new ADM.App

ADM.app.events.on 'router:init:end', ->
  Backbone.history.start
    pushState: true

ADM.app.initialize()

$(document).on 'click', 'a[data-backbone]', (e) ->
  e.preventDefault()
  console.log 'a[data-backbone] click'
  ADM.app.router.navigate($(e.currentTarget).attr('href'), {trigger: true});

$ -> ADM.app.events.t 'dom:onload'