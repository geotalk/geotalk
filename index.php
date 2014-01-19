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
          				        <div class="form profile">
                    					<!-- Edit profile form (not working)-->
                    					<form enctype="multipart/form-data" action="ajaxadd.php" method="POST" class="form-horizontal new-geode">
                    						<!-- rate -->
                                  <div class="control-group">
                                        <label class="control-group">Rating</label>
                                        <div class="control-group">                               
                                            <select id="score" name="score">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>  
            								
            								
                                        </div>
                          						<!-- Description -->
                          						<div class="control-group">
                          							<label class="control-group" for="description">Description</label>
                          							<div class="control-group">
                          								<textarea class="input-large" id="Description" name="description"></textarea>
                          							</div>
                          						</div>

                    					<br />

                      						<!-- Privacy -->
                      						<div class="control-group">
                      							<label class="control-group">Privacy</label>
                                          <div class="control-group">                               
                                              <select id="control-group" name="privacy">
                                                  <option value=""> --- Please Select --- </option>
                                                  <option value="1">Public</option>
                                                  <option value="0">Private</option>
                                              </select> 	
                                          </div>
                      						</div>
                                  <button type="submit" name="submit" class="btn">Submit</button>
                    					</div>    
                    					
                    						
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
  
  getLocation()
</script>

<?php
}
require("footer.php");


?>