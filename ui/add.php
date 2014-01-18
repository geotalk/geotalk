<?php
require("header.php");
?>
<?php
 if(isset($_REQUEST['submit'])){
	
	$query = "CALL insertGeode(".",".")";
	
	/*
	IN userID INT // $_SESSION['userid']
	,IN lat DECIMAL(10,7)	$_SESSION['lat']
	,IN lng DECIMAL(10,7)	$_SESSION['lat']
	,IN replyID INT			// $_REQUEST['replyto'];
	,IN postTime DATETIME		date( 'Y-m-d H:i:s');
	,IN postText VARCHAR(500)	// description
	,IN postRating INT 			// 1 -5 
	,IN postPicture VARCHAR(200) // Link to picture
	,IN postPrivacy INT 		 // not decided on
	,IN postTags VARCHAR(200)	// Not yet
	*/
	
	

$uploaddir = './';//<----This is all I changed
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}


print "</pre>";
	
	$result = mysql_query($query);
	
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	
	
}

?>
<div class="content">
<form enctype="multipart/form-data" action="" method="POST">

  	

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
							<label class="control-label" for="description">Description</label>
							<div class="controls">
								<textarea class="input-large" id="Description"></textarea>
							</div>
						</div>
                    <input type="file" name="file" id="file">
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
</form>
</div>
<!-- Content ends -->


<?php
require("footer.php");


?>