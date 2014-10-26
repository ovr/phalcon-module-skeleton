
class Users extends Backbone.Collection
  model: User
  url: "/api/users"
  
  initialize: ->
    console.log 'Users Collection initialize'

  parse: (data) ->
    return data.result