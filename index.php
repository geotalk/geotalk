<?php
// index

require("header.php");

if( isset ( $_REQUEST['lat'] && $_REQUEST['lng'] ) ){
?>




  	<!-- Main bar -->
  	<div class="mainbar">

	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

            <div class="row-fluid">

			<!-- Top Button widget -->
			<div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Create New Geode</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
				  
					<a class="btn" href="add.php">Create</a>
					
                  </div>

				</div>
			</div>
			</div>
			<!-- End Top Button widget -->
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Geodes</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">

					<?php
					
					$lat = $_GET['lat'];
					$lng = $_GET['lng'];
					
					$_SESSION['lat'] = $lat;
					$_SESSION['lng'] = $lng;
					
					
					
					
					$query = "CALL selectGeodesClose(".$lat.",".$lng.")";
					
					$result = $link->query($query);
					
					if (!$result) {
						echo 'Could not run query: ' . mysql_error();
						exit;
					}

					
					while ($geodes[] = $result->fetch_object());
					array_pop($geodes);
					
					$geodes = array_reverse ($geodes);
					
						foreach($geodes as $geode) :
						outputGeode($geode);
						endforeach;
					
						
					?>
					

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  

            

        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->



<?php
}
else{
?>


<script>

function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{alert("Geolocation is not supported by this browser.");}
  }
function showPosition(position)
  {
  
  window.location.href = "index.php?lat="+position.coords.latitude+"&lng="+position.coords.longitude;
  
  }
  
  getLocation()
</script>

<?php
}
require("footer.php");


?>