submit_contact_form_with_ajax = ->
  $('form#contact_form').submit (e) ->
    e.preventDefault()
    $form = $(this)

    $.ajax(
      type: 'POST'
      url: $form.attr('action')
      data: $form.serialize()
      dataType: 'json'
      encode: true
    ).done (data) ->
      alert_class = 'alert'
      if data.success
        $('#nickname').val('')
        $('#fullname').val('')
        $('#email').val('')
        $('#message').val('')
        alert_class = 'success'
      $('div.alert').remove()
      $('form').prepend("<div class='callout #{alert_class}'>" + data.feedback + '</div>');
      return
    return