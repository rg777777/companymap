<?php //$view->extend('AppBundle::base.html.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Circles</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <?php $jsdata = json_encode( $data );
    ?>

    <script>
// This example creates circles on the map, representing
// populations in North America.

// First, create an object containing LatLng and population for each city.
var data = {};
var data = <?php echo $jsdata; ?>;

console.log(data);
var citymap = {};

data.map(function (item, index, arr){
citymap[item['Countryname']] = { 
center: new google.maps.LatLng(item['country_lat'], item['country_lng']),
population: parseInt(item['population'])
};

});



var cityCircle;

function initialize() {
  // Create the map.
  var mapOptions = {
    zoom: 3,
    center: new google.maps.LatLng(0, 0),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Construct the circle for each value in citymap.
  // Note: We scale the area of the circle based on the population.
  for (var city in citymap) {
    var populationOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: citymap[city].center,
      radius: (citymap[city].population) * 1000
    };
    // Add the circle for this city to the map.
    cityCircle = new google.maps.Circle(populationOptions);
  }
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
<div class="container">



</div>

    <div id="map-canvas"></div>
  </body>
</html>