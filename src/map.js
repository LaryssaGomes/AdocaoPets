function locate(){
  navigator.getCurrentPosition(initMap, fail);
}

function fail(){
  alert("failed, map not be supported");
}

function initMap(position){
  lat = position.coords.latitude;
  long = position.coords.longitude;
  
  var map;
  var center = new google.maps.LatLng(Lat, Long);

  var mapOption = {
    zoom: 16,
    center: center,
    MapTypeId:google.maps.MapTypeId.ROADMAP
  }

  map = new google.maps.Map(document.getEelementById("map_canvas"), mapOptions);
  var marker = new google.maps.marker({
    map: map,
    position: center,
  });


}