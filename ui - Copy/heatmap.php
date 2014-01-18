<?php
// index

require("header.php");

?>

    <style>
      #map-canvas {
        height: 100%;
		min-height:400px;
        margin: 0px;
        padding: 0px
      }
   
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=visualization"></script>
    <script>
// Adding 500 Data Points
var map, pointarray, heatmap;

var taxiData = <?php echo heatmapdata() ?>;

function initialize() {
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(<?php echo $_SESSION['lat'] ?>, <?php echo $_SESSION['lng'] ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var pointArray = new google.maps.MVCArray(taxiData);

  heatmap = new google.maps.visualization.HeatmapLayer({
    data: pointArray
  });

  heatmap.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

<!-- Main bar -->
    <div id="map-canvas">
   
   <div class="clearfix"></div>

</div>
<!-- Content ends -->



<?php
require("footer.php");


?>