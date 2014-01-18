<?php

// Defines

	$userimage = "profile_pic";
	$fullname = "fullname";
	$description = "description";
	$geodeauthorimg  = "geodeauthorimg";
	$geodeauthor  = "geodeauthor";
	$geodecomment  = "geodecomment";
	
	function outputGeode($geode){
		echo '
			<div class="user">
			
			<div class="user-pic">
				<a href="#">
					<img src="'.$geode[$geodeauthorimg].'" alt="" />
				</a>
			</div>
			
			<div class="user-details">
				<h5>'.$geode[$geodeauthor].'</h5>
				<p>'.$geode[$geodecomment].'</p>';
			
			if (isset($geode[$imagesrc])) echo '<img src="'.$geode[$imagesrc].'">';
				
			echo '</div>
			
			<div class="clearfix"></div>';
		
		
		// If it has children
		if (count($geode['children')){
			foreach ($geode['children'] as $children){
				outputGeode($children)
			}
		} 
		echo '</div><hr />';
	}
?>