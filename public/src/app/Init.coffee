ADM.app = new ADM.App

ADM.app.events.on 'router:init:end', ->
  Backbone.history.start
    pushState: true
    root: "/admin/"

ADM.app.init()

$ -> ADM.app.events.t 'dom:onload'