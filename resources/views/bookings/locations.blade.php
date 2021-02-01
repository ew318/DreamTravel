@extends('layouts.app')

@section('title', 'My Locations')

@section('content')
    <h1 class="title">Past and Future Locations</h1>

    <div id="map"></div>

    <div class="control-ui" style="z-index: 0; left: 0px;">
        <div id="search-control-ui">
          <p>
          <img src="http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f4b241" alt="New locations">Upcoming Locations
          <img src="http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|b642f4" alt="Old locations">Previous Destinations
          </p>
        </div>
    </div>

    <script>
    function initMap() {
      // Centre of Map
      var manchester = {lat: 53, lng: -2};
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 6, center: manchester});

      // Markers for upcoming holidays
      var lats = {{json_encode($lat)}};
      var longs = {{json_encode($long)}};
      for (i = 0; i < lats.length; i++) {
        var marker = new google.maps.Marker({
        position: new google.maps.LatLng(lats[i], longs[i]),
        map: map,
        icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f4b241"
          });
      }

      // Markers for holidays in the pasts
      var oldlats = {{json_encode($oldlat)}};
      var oldlongs = {{json_encode($oldlong)}};
      for (i = 0; i < oldlats.length; i++) {
        var marker = new google.maps.Marker({
        position: new google.maps.LatLng(oldlats[i], oldlongs[i]),
        map: map,
        icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|b642f4"
          });
      }
    }
    </script>
    <script async defer
            src="http://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap">
    </script>
@endsection
