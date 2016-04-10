$ ->
  $(document).foundation()

  # # Vegas slider
  # init_vegas_gallery()

  # # Mapbox script
  # $('#map').addClass('map-mapbox')
  # init_mapbox()

  # Save form in LocalStorage and send it by Ajax
  $('form').formBackup()
  submit_contact_form_with_ajax()

  # Autosize textarea
  autosize $('textarea')

  setTimeout (->
    $('.alert-box').fadeOut()
    return
  ), 5000