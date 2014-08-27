ADM.App = (function() {
  function App() {}

  App.prototype.events = _.extend(ADM.Events, Backbone.Events);

  App.prototype.initialize = function() {
    this.events.t('init:start');
    this.events.on('dom:onload', this.dom_onload, this);
    this.events.on('init:dom:end', function() {
      return this.events.t('init:end');
    }, this);
    this.pageHeader = $('.page-header');
    this.router = new ADM.Router;
    return this.events.t('init:dom:end');
  };

  App.prototype.dom_onload = function() {
    return console.log('dom_onload');
  };

  App.prototype.dashboard = function() {
    console.log('ADM.App dashboard');
    return this.pageHeader.text('Dashboard');
  };

  App.prototype.users = function() {
    console.log('AMD.App.users();');
    return this.pageHeader.text('Users');
  };

  App.prototype.products = function() {
    return this.pageHeader.text('Products');
  };

  return App;

})();
