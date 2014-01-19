<?php

	require("functions.php");


		if ($fbID = getFacebookID()){
			$query = "SELECT `user_id` FROM  `users` WHERE  `user_facebook` = ".getFacebookID().";";

			$result = $link->query($query);

			while ($item = mysqli_fetch_object($result)) {
				$FBuserID = $item->user_id;
			}	
		}

		$userID = isset($FBuserID)? $FBuserID : 1;
		
		$replytext = isset($_REQUEST['replytext'])? $_REQUEST['replytext'] : "null";
	
		$score = isset($_REQUEST['score'])? $_REQUEST['score'] : "null";
		$privacy = isset($_REQUEST['privacy'])? $_REQUEST['privacy'] : "null";
		
		$replyto = isset($_REQUEST['replyto'])?$_REQUEST['replyto'] : "null" ;

		$query = 'CALL insertGeode('.$userID.','.$_SESSION['lat'].','.$_SESSION['lng'].','.$replyto.',"'. date( 'Y-m-d H:i:s').'","'.$replytext.'",'.$score.','. '"img"' . ','.'"word"'.','.$privacy.')';

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


?>