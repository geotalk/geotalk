<?php

require("header.php");
?>
<div class="content">

  	

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
                  <div class="pull-left">Add Geode</div>
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
					<form class="form-horizontal">
						<!-- Country -->
                        <div class="control-group">
                            <label class="control-label">Rating</label>
                            <div class="controls">                               
                                <select>
                                    <option value=""> --- Please Select --- </option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>  
                            </div>
                        </div>    
						<!-- Description -->
						<div class="control-group">
							<label class="control-label" for="discription">Description</label>
							<div class="controls">
								<textarea class="input-large" id="Description"></textarea>
							</div>
						</div>
                    <button class="btn"><i class="icon-paper-clip"></i> Add Picture</button>
					<br />
					<br />

						<button type="submit" class="btn">Submit</button>
					</form>
					</div>
                    <div class="clearfix"></div>
                          

                    <hr />

                                                               

                    
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