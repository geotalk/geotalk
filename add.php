<?php
require("header.php");
?>
<div class="content">


<?php
 if(isset($_REQUEST['submit'])){
	
	// One is anonymous 
	
	if ($fbID = getFacebookID()){
		$query = "SELECT `user_id` FROM  `users` WHERE  `user_facebook` = ".getFacebookID().";";

		$result = $link->query($query);
		
		while ($item = mysqli_fetch_object($result)) {
			$FBuserID = $item->user_id;
		}	
	}
	
	$userID = isset($FBuserID)? $FBuserID : 1;
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
							<label class="control-group">Picture Upload</label>
							<div class="control-group">                               
                           		<input type="file" value="U">								
                            </div>

					</div>    
					
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


?>