ADM.app = new ADM.App;

ADM.app.events.on('router:init:end', function() {
  return Backbone.history.start({
    pushState: true,
    root: '/admin/'
  });
});

ADM.app.init();

$(document).on('click', 'a[data-backbone]', function(e) {
  e.preventDefault();
  return Backbone.history.navigate($(e.currentTarget).attr('href'));
});

$(function() {
  return ADM.app.events.t('dom:onload');
});
