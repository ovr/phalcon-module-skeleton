ADM.App = (function() {
  function App() {}

  App.prototype.events = _.extend(ADM.Events, Backbone.Events);

  App.prototype.init = function() {
    this.events.t('init:start');
    this.events.on('dom:onload', this.dom_onload, this);
    this.events.on('init:dom:end', function() {
      return this.events.t('init:end');
    }, this);
    this.router = new ADM.Router;
    return this.events.t('init:dom:end');
  };

  App.prototype.dom_onload = function() {
    return console.log('dom_onload');
  };

  App.prototype.dashboard = function() {
    return console.log('ADM.App dashboard');
  };

  return App;

})();
