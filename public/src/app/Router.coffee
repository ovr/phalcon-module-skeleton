
class ADM.Router extends Backbone.Router
  routes:
    '': 'dashboard'
    'users': 'users'
    'products': 'products'

  initialize: ->
    console.log 'Router init'
    ADM.app.events.t 'router:init:end'

  dashboard: ->
    console.log 'users route'
    ADM.app.dashboard()

  users: ->
    console.log 'users route'

  products: ->
    console.log 'products route'