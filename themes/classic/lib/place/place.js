var map;
var searchBox;
var markers = [];
var bounds;
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
var marker;
var re;
var zoommap = 17;
var str = '',i = 0;
var id = "#place_address";
var arrayPosition = [];
function initialize() {
  var mapOptions = {
    zoom: zoommap,
    center:new google.maps.LatLng(21.004722, 105.82205810000005),
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(21.004722, 105.82205810000005));
  var input = document.getElementById('pac-input');

  searchBox = new google.maps.places.SearchBox((input));
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    places = searchBox.getPlaces();
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }
    markers = [];
    bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var t = "<input type ='hidden' name='longitude' value="+place.geometry.location.e+"><input type ='hidden' name='latitude' value="+place.geometry.location.d+"><input type ='hidden' name='name_location' value='"+place.formatted_address+"'>";
      $(id).html(t);
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };
      re = place;
      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });
      map.zoom = zoommap;
      markers.push(marker);

      bounds.extend(place.geometry.location);
      map.fitBounds(bounds);
    }
     
  });

}
google.maps.event.addDomListener(window, 'load', initialize);
function codeLatLng(lat,lng) {
  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(zoommap);
        marker = new google.maps.Marker({
            position: latlng,
            map: map
        });
        place = results[1];
        var t = "<input type ='hidden' name='longitude' value="+place.geometry.location.e+"><input type ='hidden' name='latitude' value="+place.geometry.location.d+"><input type ='hidden' name='name_location' value='"+place.formatted_address+"'>";
        $(id).html(t);
        infowindow.open(map, marker);
      } else {
        alert('No results found');
      }
    } else {
      alert('Geocoder failed due to: ' + status);
    }
  });
}