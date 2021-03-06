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
      var pointArray = new google.maps.MVCArray(taxiData);

      var gradient = [
        'rgba(0, 255, 255, 0)',
        'rgba(0, 255, 255, 1)',
        'rgba(0, 191, 255, 1)',
        'rgba(0, 127, 255, 1)',
        'rgba(0, 63, 255, 1)',
        'rgba(0, 0, 255, 1)',
        'rgba(0, 0, 223, 1)',
        'rgba(0, 0, 191, 1)',
        'rgba(0, 0, 159, 1)',
        'rgba(0, 0, 127, 1)',
        'rgba(63, 0, 91, 1)',
        'rgba(127, 0, 63, 1)',
        'rgba(191, 0, 31, 1)',
        'rgba(255, 0, 0, 1)'
      ]
      
      function initialize() {
        var mapOptions = {
          zoom: 18,
          center: new google.maps.LatLng(<?php echo $_SESSION['lat'] ?>, <?php echo $_SESSION['lng'] ?>),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

        
        
        heatmap = new google.maps.visualization.HeatmapLayer({
          data: pointArray
        });

        heatmap.setMap(map);
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      google.maps.event.addDomListener(window, 'load', initialize);

      // refreshing Heatmap

      
      var counter = 0;

      function updateMap () {
        console.log("update", counter++);
		
        var latestData = <?php echo heatmapdata() ?>;
        console.log(latestData);
        heatmap.setData(latestData);
        // for (var i = 0, len = latestData.length; i < len; i++) {
        //   console.log("updateMap", latestData[i])
        //   pointArray.push(latestData[i]);
        // }

      }

      var timeInterval = setInterval(function(){updateMap()}, 5000);

    </script>

<!-- Main bar -->
    <div id="map-canvas">
   
   <div class="clearfix"></div>

</div>



<?php
	require("footer.php");
?>