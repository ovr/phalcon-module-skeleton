
class ADM.Router extends Backbone.Router
  routes:
    'admin/': 'dashboard'
    'admin/users/': 'users'
    'admin/products/': 'products'

  initialize: ->
    console.log 'Router init'
    ADM.app.events.t 'router:init:end'

  dashboard: ->
    console.log 'dashboard route'
    ADM.app.dashboard();

  users: ->
    console.log 'users route'
    ADM.app.users();

  products: ->
    console.log 'products route'
    ADM.app.products();
