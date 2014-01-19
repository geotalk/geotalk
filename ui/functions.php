<?php

// Defines
require_once("connect.php");

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
		return $_SESSION["fb_".appID."_user_id"];
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



	//
	function outputGeode($geode){
	global $link;
		//var_dump($geode);
		
		echo '
		
	
			<div id="geode-'.$geode->CloseLocationID.'" class="user">
				
				
				<div style="float:right;">
					<abbr class="timeago" title="'. date ( 'c', strtotime($geode->post_time )).'">'.strtotime($geode->post_time ).'</abbr>
				</div>
				<div class="user-pic">
					<a href="#">
						<img src="'.$geode->profile_pic.'" alt="" />
					</a>
					<h5>'.$geode->username.'</h5>
				</div>
			
			<div class="user-details">
				<p>'.$geode->post_text.'</p>';
				
			if (isset($geode->url)) echo '<img class="submitted-pic" src="'.$geode->url.'">';
				
			echo '</div>';
			
			echo '<p><a href="add.php?replyto='.$geode->CloseLocationID.'">Reply</a></p>

			<div class="clearfix"></div>';
				
				
				
				
			$childlink = mysqli_connect('localhost', 'root', 'root', 'hack');
			if (!$childlink) {
				die('Not connected : ' . mysql_error());
			}

			$query2 = "CALL selectChildren(".$geode->CloseLocationID.");";
			$result2 = $childlink->query($query2);
			
			if (!$result2) {
						echo 'Could not run query: ' . mysql_error();
						
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