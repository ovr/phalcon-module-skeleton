ADM.app = new ADM.App;

ADM.app.events.on('router:init:end', function() {
  return Backbone.history.start({
    pushState: true,
    root: "/admin/"
  });
});

ADM.app.init();

$(function() {
  return ADM.app.events.t('dom:onload');
});
