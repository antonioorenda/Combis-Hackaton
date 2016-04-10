
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Mapa</h2>
    </div>
</div>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Mapa</h5>
    </div>
    <div class="ibox-content">
        
      <input id="address" type="textbox" value="Sydney, NSW">
      <input id="address2" type="textbox" value="Sydney, NSW">
      <input id="submit" type="button" value="Geocode">

    <div id="map"></div>
    
  </body>
</html>

    </div>
</div>

<script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 43.967038, lng: 15.725786}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        var address2 = document.getElementById('address2').value;
        geocoder.geocode({'address': address, 'address2': address2}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnlEGtbz-iiGSqzsDO8IWTxRBb51sHE3A&callback=initMap">
    </script>

<style>

#map {
  height: 550px;
}

</style>
