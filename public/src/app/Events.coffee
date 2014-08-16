
ADM.Events =
  t: (event_name, options = {}) ->
    console.log "EVENT Triggered '#{event_name}'", options
    @trigger event_name, options