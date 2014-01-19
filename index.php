<?php
// index

require("header.php");

if( isset ( $_REQUEST['lat'] ) && isset ($_REQUEST['lng'] ) ){
?>




  	<!-- Main bar -->
  	<div class="mainbar">

	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

            <div class="row-fluid">


          			<!-- Top Button widget -->
          			<div class="widget">
                    <div class="widget-head" >
                        <div class="pull-left">Create New Geode</div>
                          <div class="widget-icons pull-right">
                              <a href="#" class="wminimize"><i class="icon-chevron-down"></i></a> 
                              <a href="#" class="wclose"><i class="icon-remove"></i></a>
                          </div>  
                          <div class="clearfix"></div>
                    </div>
                    <div class="widget-content" id="form">
                        <div class="padd">
          				        <div class="form profile">
                    					<!-- Edit profile form (not working)-->
                    					<form enctype="multipart/form-data" action="ajaxadd.php" method="POST" class="form-horizontal new-geode">
                    						<!-- Country -->
                        <div class="control-group">
                            <label class="control-label">Rate this spot!</label>
                            <div class="controls">                               
                               
								<input type="text" name="score" class="dial" data-width="150" data-min="0" data-max="5" data-angleArc="250" data-angleOffset=-125>
                
                            </div>
              
              <label class="control-label">Private</label>
                            <div class="controls">   

<input type="checkbox" name="privacy" value="0">
                
                
                            </div>
                        </div>    
            <!-- Description -->
            <div class="control-group">
              <label class="control-label" for="description">Content</label>
              <div class="controls">
                <textarea class="input-large" id="Description" name="description"></textarea>
              </div>
            </div>
                    <!-- <input type="file" name="file" id="file"> -->
          <br />
          <br />

          
          
            
          
            <button type="submit" name="submit" class="btn">Submit</button>
                    					
                    						
                    					</form>
          					</div>
                              <div class="clearfix"></div>
          					
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
                  <div class="padd geodes">

					
					<?php
					
					$lat = $_REQUEST['lat'];
					$lng = $_REQUEST['lng'];
					
					$_SESSION['lat'] = $lat;
					$_SESSION['lng'] = $lng;
					
					
					
					
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

  var url = '/';
	var form = $('<form style="display:none "action="' + url + '" method="post">' +
  '<input type="text" name="lat" value="' + position.coords.latitude + '" />' +
   '<input type="text" name="lng" value="' + position.coords.longitude + '" />' +
  '</form>');
jQuery('body').append(form);
jQuery(form).submit();


  }
  
  getLocation();

</script>

<?php
}
require("footer.php");


?>