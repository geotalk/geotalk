<?php
require("header.php");
?>
<div class="content">


<?php
 if(isset($_REQUEST['submit'])){
	
	// One is anonymous 
	$userID = isset($_SESSION['userid'])? $_SESSION['userid'] : 1;
	$comment = $_REQUEST['description'];
	$score = $_REQUEST['score'];
	$privacy = $_REQUEST['privacy'];
	$replyto = isset($_REQUEST['replyto'])?$_REQUEST['replyto'] : "null" ;
	
	$query = 'CALL insertGeode('.$userID.','.$_SESSION['lat'].','.$_SESSION['lng'].','.$replyto.',"'. date( 'Y-m-d H:i:s').'","'.$comment.'",'.$score.','. '"img"' . ','.'"word"'.','.$privacy.')';
	
	var_dump($query);
	
	$result = $link->query($query);//mysql_query($query);
	
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	
	echo "Successfuly Submitted";
	
	

//	,IN postTags VARCHAR(200)	// Not yet

	
	
/*
$uploaddir = './';//<----This is all I changed
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}


print "</pre>";
	
	*/
}

?>

  	

  	<!-- Main bar -->
  	<div class="mainbar">

	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

            <div class="row-fluid">



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
					<form enctype="multipart/form-data" action="" method="POST" class="form-horizontal">
						<!-- Country -->
                        <div class="control-group">
                            
							<br >
							<label class="control-label">Privacy</label>
                            <div class="controls">                               
                                <select id="privacy" name="privacy">
                                    <option value=""> --- Please Select --- </option>
                                    <option value="1">Public</option>
                                    <option value="0">Private</option>
                                </select>  
								
								
                            </div>
                        </div>    
						<!-- Description -->
						<div class="control-group">
							<label class="control-label" for="description">Description</label>
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
                          

                    <hr />

                                                               

                    
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
require("footer.php");


?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      