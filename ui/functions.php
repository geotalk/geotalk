<?php

// Defines
require_once("connect.php");
	define("userimage", "profile_pic");
	define("description", "");
	define("geodeauthorimg", "profile_pic");
	define("geodeauthor", "username");
	define("geodecomment", "post_text");
	define("childrenlist", "children");
	define("imagesrc", "url");
	define("post_time", "post_time");
	define("rank", "rank");
	define("id", "CloseLocationID");
	
	
	
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
		
			<div style="float:left">
				<div class="user-pic"><abbr class="timeago" title="'. date ( 'c', strtotime($geode->post_time )).'">'.strtotime($geode->post_time ).'
			</div>
		
			<div id="geode-'.$geode->CloseLocationID.'" class="user">
			
				</abbr><a href="#">
					<img src="'.$geode->profile_pic.'" alt="" />
				</a>
			</div>
			
			<div class="user-details">
				<h5>'.$geode->username.'</h5>
				<p>'.$geode->post_text.'</p><p><a href="add.php?replyto='.$geode->CloseLocationID.'">Reply</a></p>';
				
			if (isset($geode->url)) echo '<img class="submitted-pic" src="'.$geode->url.'">';
				
			echo '</div>
			
			<div class="clearfix"></div>';
				
				
				
				
			$childlink = mysqli_connect('localhost', 'root', '', 'hack');
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