<?php

	require("functions.php");

		$userID = getUserID();
		
		$replytext = isset($_REQUEST['replytext'])? $_REQUEST['replytext'] : "null";
	
		$score = isset($_REQUEST['score'])? $_REQUEST['score'] : "null";
		$privacy = isset($_REQUEST['privacy'])? $_REQUEST['privacy'] : "null";
		
		$replyto = isset($_REQUEST['replyto']) ? $_REQUEST['replyto'] : "null" ;
		
		$date = date( 'Y-m-d H:i:s');
		$query = 'CALL insertGeode('.$userID.','.$_SESSION['lat'].','.$_SESSION['lng'].','.$replyto.',"'. date( 'Y-m-d H:i:s').'","'.$replytext.'",'.$score.','. '"img"' . ','.'"word"'.','.$privacy.')';

		
		
		$result = $link->query($query);

		if (!$result) {
			echo 'Could not run query: ' . mysqli_error($link);
			exit;
		}
		
		
		$query = 'SELECT last_insert_id() AS `geode_id` FROM `geode`'; //SELECT `geode_id` FROM `geode` WHERE `post_time` = "'.$date.'" AND `post_text` = "'.$replytext.'";';
		
		$result = $link->query($query);
		
		while ($item = mysqli_fetch_object($result)) {
			$postID = $item->geode_id;
		}
	
		
		$query = 'SELECT `username`, `profile_pic` FROM  `users` WHERE  `user_id` ='.$userID;
		$result = $link->query($query);
		
		while ($item = mysqli_fetch_object($result)) {
			$username = $item->username;
			$profile_pic = $item->profile_pic;
		}

		?>
		<div class="user">
			<div style="float:right; margin:1%;">
					<abbr class="timeago" title="<?php echo date ( 'c') ?>"> <?php echo time(); ?></abbr>
				</div>
			<div class="user-pic">
				<a href="#">
					<img src="<?php echo $profile_pic ?>" alt="" />
				</a>
				<h5>
					<?php echo $username?>
				</h5>
			</div>
			<div class="user-details">
				<p style="padding:1%;">
					<?php echo $replytext ?>
				</p>
			</div>
			<form class="reply" action="ajaxadd.php">
				<input type="hidden" name = "parent" value = "<?php echo $postID ?>" >
				<textarea class="form-control" rows="1" name="replycontent"> </textarea>
				<button type="submit" class="btn btn-default">Reply</button>
			</form>

			<div class="clearfix"></div>
		</div>
<?php


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