var __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

ADM.Router = (function(_super) {
  __extends(Router, _super);

  function Router() {
    return Router.__super__.constructor.apply(this, arguments);
  }

  Router.prototype.routes = {
    'admin/': 'dashboard',
    'admin/users/': 'users',
    'admin/products/': 'products'
  };

  Router.prototype.initialize = function() {
    console.log('Router init');
    return ADM.app.events.t('router:init:end');
  };

  Router.prototype.dashboard = function() {
    console.log('dashboard route');
    return ADM.app.dashboard();
  };

  Router.prototype.users = function() {
    console.log('users route');
    return ADM.app.users();
  };

  Router.prototype.products = function() {
    console.log('products route');
    return ADM.app.products();
  };

  return Router;

})(Backbone.Router);
