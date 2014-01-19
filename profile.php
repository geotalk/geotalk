<?php
// index

require("header.php");
?>


<!-- Main content starts -->

<div class="content">

  	

  	<!-- Main bar -->
  	<div class="mainbar">

	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

            <div class="row-fluid">

            <div >

              <!-- User widget -->
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">User Profile</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd row-fluid">
                      <div class="user-pic pull-left span6">
                        <!-- User pic -->
                        <a href="#"><img src="img/user-big.jpg" alt="" /></a>
                      </div>

                      <div class="user-details pull-right span6">
                      <a href="profile_edit.html" class="btn btn-info btn-mini"><i class="icon-user"></i> Edit Profile</a> 
                        <h2>Name: Ashok Singh</h2>
                        <h5>Default Privacy: Semi-Public </h5>
                        <p> Description: Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at ac ultrices magna. Aliquam consequat, purus vitae auctor ullamcorper.</p>
                      </div>
                    <div class="clearfix"></div>
                          

                    <hr />

                  </div>
                  
                </div>
              </div>  

            </div>

        </div>
		  </div>

		<!-- Matter ends -->

				<?php
			$query = "CALL selectGeodesClose(".$_SESSION['lat'].",".$_SESSION['lng'].",". 0.05 .")";
			
					
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

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<?php
require("footer.php");


?>