init_mapbox = ->
  if $('#map').length
    latitude = '44.502'
    longitude = '1.224'
    L.mapbox.accessToken = ''
    map = L.mapbox.map('map', '', attributionControl: false).setView([
      latitude
      longitude
    ], 14)
    featureLayer = L.mapbox.featureLayer(
      type: 'FeatureCollection'
      features: [ {
        type: 'Feature'
        properties:
          title: 'Gaëtan Herbelot'
          city: 'Castelfranc'
          postcode: '46140'
          mappy_url: 'http://fr.mappy.com/itineraire#/11/M2/TSearch/SCastelfranc+46140/N151.12061,6.11309,1.22301,44.50121/Z7/'
          'marker-color': '#ab4526'
          'marker-size': 'medium'
        geometry:
          type: 'Point'
          coordinates: [
            longitude
            latitude
          ]
      } ]).addTo(map)
    featureLayer.eachLayer (layer) ->
      lfp = layer.feature.properties
      content = "
        <div class='mapbox-popup-content text-center'>
          <h2>#{lfp.title}</h2>
          <p> #{lfp.postcode} - #{lfp.city} </p>
          <p>
            <a href='#{lfp.mappy_url}' target='_blank' title='Calculer votre distance avec Castelfranc' class='button tiny secondary'>
              Calculer votre distance
              <br />
              avec ma ville
            </a>
          </p>
        </div>
      "
      layer.bindPopup content, {}
      return
    map.featureLayer.on 'ready', (e) ->
    featureLayer.openPopup()
    map.touchZoom.disable()
    map.scrollWheelZoom.disable()
    if isSmall()
      map.dragging.disable()
      if map.tap
        map.tap.disable()
  return
