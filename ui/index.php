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

					<?php foreach ($users as $user){ ?>
					
						 <div class="user">
						  <div class="user-pic">
							<!-- User pic -->
							<a href="#"><img src="<?php echo $geode[$geodeauthor]; ?>" alt="" /></a>
						  </div>

						  <div class="user-details">
							<h5><?php echo $geode[$author] ?></h5>
							<p><?php echo $geode[$comment] ?></p>
						  </div>
						  <div class="clearfix"></div>
						</div>
						
						<?php if (count($geode['children')){
							// If this has children recursively loop through children
						} ?>
						
						<hr />
					
					<?php } ?>
					

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