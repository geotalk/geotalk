<?php

// Defines

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
	
	
	
	// Functions 
	
	function mysql_fetch_all($result) {
		while($row=mysql_fetch_array($result)) {
			$return[] = $row;
		}
		return $return;
	}



	//
	function outputGeode($geode){
		//var_dump($geode);
		
		echo '
		
			<div id="geode-'.$geode[id].'" class="user">
			
			<div class="user-pic">'.
			$geode[post_time].'
				<a href="#">
					<img src="'.$geode[geodeauthorimg].'" alt="" />
				</a>
			</div>
			
			<div class="user-details">
				<h5>'.$geode[geodeauthor].'</h5>
				<p>'.$geode[geodecomment].'</p>';
			
			if (isset($geode[imagesrc])) echo '<img class="submitted-pic" src="'.$geode[imagesrc].'">';
				
			echo '</div>
			
			<div class="clearfix"></div>';
		
		
		
		//$children = explode(",", $geode[$childrenlist]);
		// need to get children geode arrays not ID's
		// If it has children
		//if (count($children)){
		//	foreach ($children as $child){
		//		outputGeode($child);
		//	}
		//} 
		echo '</div><hr />';
	}
?>