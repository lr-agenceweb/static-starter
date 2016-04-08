init_vegas_gallery = ->
  unless isSmall()
    $('body.vegas').vegas
      slides: [
        { src: '/assets/images/slider/slide1.jpg' }
        { src: '/assets/images/slider/slide2.jpg' }
        { src: '/assets/images/slider/slide3.jpg' }
        { src: '/assets/images/slider/slide4.jpg' }
      ]
      timer: false
      shuffle: false
      transition: 'fade2'
