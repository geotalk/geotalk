<?php

require_once("variables.php");

if (isset($_REQUEST['submit'])){

}
else{

// Get Posts

//SQL Query

foreach($geodes as $geode){
	$output = "<div>";
	$output.= "<span id='username'>".$geode[$username]."</span>";
				


	//Do shit with $post

	$output .= "</div>";
	echo $output;
}


<?php
}
?>