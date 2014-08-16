window.ADM = (function() {
  function ADM() {}

  return ADM;

})();

ADM.App = (function() {
  function App() {}

  App.prototype.events = _.extend(ADM.Events, Backbone.Events);

  App.prototype.init = function() {
    this.events.t('init:start');
    this.events.on('dom:onload', this.dom_onload, this);
    return this.events.on('init:dom:end', function() {
      return this.events.t('init:end');
    }, this);
  };

  App.prototype.dom_onload = function() {
    return console.log('dom_onload');
  };

  return App;

})();

ADM.app = new ADM.App;

ADM.app.events.on('router:init:end', function() {
  return Backbone.history.start({
    pushState: true
  });
});

ADM.app.init();

$(function() {
  return BBNS.app.events.t('dom:onload');
});
