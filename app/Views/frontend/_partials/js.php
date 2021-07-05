<!-- js -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwpQbIvzRtyUWbnG-fKkhDFrXWqygSoa8&callback=initMap"></script>
<script>
  $('.toggle').on('click', function(){
    $('.menu-sidebar').addClass('slideIn')
  })

  $('.close-btn').on('click', function(){
    $('.menu-sidebar').removeClass('slideIn')
  })

  $('.search').on('click', function(){
    $('.search-float').toggleClass('show-up')
  })

  $(document).on('click', '.scroll-down', function(event){
    event.preventDefault();
    var viewportHeight = $(window).height();

    $('html, body').animate({
      scrollTop: viewportHeight,
    }, 700);
  })

  window.initMap = function(){
    var mapcenter = {lat: -6.1665207714398, lng:  106.82544824454114};

    var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 13, center: mapcenter}
    );

    var marker = new google.maps.Marker({position: {lat: -6.149856214247394, lng: 106.90281447067102}, icon: 'assets/images/marker-map.png', map: map});
  }
</script>
