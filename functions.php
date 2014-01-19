<?php

// Defines
require_once("connect.php");
session_start();

define("appID", '1399808763601662');

	define("userimage", "profile_pic");
	define("description", "");
	define("geodeauthorimg", "profile_pic");
	define("geodeauthor", "username");
	define("geodecomment", "post_text");
	define("childrenlist", "children");
	define("imagesrc", "url");
	define("post_time", "post_time");
	define("rank", "rank");
	
	
	function getFacebookID(){
		 if (isset($_SESSION["fb_".appID."_user_id"])) return $_SESSION["fb_".appID."_user_id"];
		 else return "";
	}
	
	function getUserID(){
		if ($fbID = getFacebookID()){
			$query = "SELECT `user_id` FROM  `users` WHERE  `user_facebook` = ".getFacebookID().";";

			$result = $link->query($query);

			while ($item = mysqli_fetch_object($result)) {
				$FBuserID = $item->user_id;
			}	
		}
		
		return isset($FBuserID)? $FBuserID : 1;
	}
	
	function heatmapdata(){
	
	global $link;
		
		$sql = "SELECT latitude, longitude
        FROM   location";

		$result = $link->query($sql);

		if (!$result) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}

		
		$output="";
		while ($item = mysqli_fetch_object($result)) {
			$output .= "new google.maps.LatLng(".$item->latitude.", ".$item->longitude."),";
		}
		
		mysqli_free_result($result);
			
		rtrim($output, ",");
	
		echo "[".substr($output, 0, -1). "]";
	}
	
	// Functions 
	
	function mysql_fetch_all($result) {
		while($row=mysql_fetch_array($result)) {
			$return[] = $row;
		}
		return $return;
	}


	function outputGeode($geode){
	global $link;
	?>
	
			
			<div id="geode-<?php echo $geode->CloseLocationID ?>" geode="<?php echo $geode->CloseLocationID ?>" class="user">
				
				
				<div style="float:right; margin:1%;">
					<abbr class="timeago" title="<?php echo date ( 'c', strtotime($geode->post_time )) ?>"> <?php echo strtotime($geode->post_time ); ?></abbr>
				</div>
				<div class="user-pic">
					<a href="#">
						<img src=" <?php echo $geode->profile_pic ?>" alt="" />
					</a>
					<h5><?php echo $geode->username ?></h5>
				</div>

			<div class="user-details">
				<p style="padding:1%;"><?php echo $geode->post_text ?></p>
				
				<?php if (isset($geode->url)){ ?>
					<img class="submitted-pic" src="<?php echo $geode->url ?>">
					<br />
				<?php } ?>
			</div>
			
			<form class="reply" action="ajaxadd.php">
				<input type="hidden" name = "parent" value = "<?php echo $geode->CloseLocationID ?>" >
				<textarea class="form-control" rows="1" name="replycontent"> </textarea>
				<button type="submit" class="btn btn-default">Reply</button>
			</form>

			<div class="clearfix"></div>
				
				
				<?php 
				
			$childlink = mysqli_connect(mysql_host, mysql_user, mysql_pass, mysql_tabl);
			
			if (!$childlink) {
				die('Not connected : ' . mysqli_error($childlink));
			}

			$query2 = "CALL selectChildren(".$geode->CloseLocationID.");";
			$result2 = $childlink->query($query2);
			
			if (!$result2) {
						echo 'Could not run query: ' . mysqli_error($childlink);
						
			}
			else{

					
					while ($children[] = $result2->fetch_object());
					array_pop($children);
				
					foreach($children as $child) {
						outputGeode($child);
					}
			
			}
		
			
		echo '</div>';
	}
	

	
	function outputGeode($geode){
	global $link;
	?>
	
			
			<div id="geode-<?php echo $geode->CloseLocationID ?>" geode="<?php echo $geode->CloseLocationID ?>" class="user">
				
				
				<div style="float:right; margin:1%;">
					<abbr class="timeago" title="<?php echo date ( 'c', strtotime($geode->post_time )) ?>"> <?php echo strtotime($geode->post_time ); ?></abbr>
				</div>
				<div class="user-pic">
					<a href="#">
						<img src=" <?php echo $geode->profile_pic ?>" alt="" />
					</a>
					<h5><?php echo $geode->username ?></h5>
				</div>

			<div class="user-details">
				<p style="padding:1%;"><?php echo $geode->post_text ?></p>
				
				<?php if (isset($geode->url)){ ?>
					<img class="submitted-pic" src="<?php echo $geode->url ?>">
					<br />
				<?php } ?>
			</div>
			
			<form class="reply" action="ajaxadd.php">
				<input type="hidden" name = "parent" value = "<?php echo $geode->CloseLocationID ?>" >
				<textarea class="form-control" rows="1" name="replycontent"> </textarea>
				<button type="submit" class="btn btn-default">Reply</button>
			</form>

			<div class="clearfix"></div>
				
				
				<?php 
				
			$childlink = mysqli_connect(mysql_host, mysql_user, mysql_pass, mysql_tabl);
			
			if (!$childlink) {
				die('Not connected : ' . mysqli_error($childlink));
			}

			$query2 = "CALL selectChildren(".$geode->CloseLocationID.");";
			$result2 = $childlink->query($query2);
			
			if (!$result2) {
						echo 'Could not run query: ' . mysqli_error($childlink);
						
			}
			else{

					
					while ($children[] = $result2->fetch_object());
					array_pop($children);
				
					foreach($children as $child) {
						outputGeode($child);
					}
			
			}
		
			
		echo '</div>';
	}
	
					
					
?>