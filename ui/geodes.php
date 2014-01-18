<?php
// index

require("header.php");

?>



  	<!-- Main bar -->
  	<div class="mainbar">

	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

            <div class="row-fluid">

            <div class="span5">

              <!-- User widget -->
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
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->



<?php
require("footer.php");


?>