<?php

function sanitize($string){
	return stripslashes( htmlentities($string));
}

?>