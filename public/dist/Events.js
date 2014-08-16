ADM.Events = {
  t: function(event_name, options) {
    if (options == null) {
      options = {};
    }
    console.log("EVENT Triggered '" + event_name + "'", options);
    return this.trigger(event_name, options);
  }
};
