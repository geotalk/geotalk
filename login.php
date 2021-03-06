<?php
include('header.php');
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require 'facebook/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => appID,
  'secret' => 'c83164625a64b093a317ad689c90e4b5',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl();
}

 if (!$user){ ?>
     
  
      
      <div>
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
	  
<?php } 
else {

	// Check and or create
	
	$query = 'SELECT * 
FROM  `users` 
WHERE  `user_facebook` = "'.getFacebookID().'";';

$result = $link -> query($query);

if (!mysqli_num_rows($result)) { // Create User 

	$query = "INSERT INTO users (`user_facebook`,`profile_pic`,`username`)
	VALUES (\"".getFacebookID()."\",\"https://graph.facebook.com/".$user."/picture\", \"".addslashes($user_profile['name']) ."\");";

	$link -> query($query);
	
	echo "Facebook Linked!";
}
else{

					
					

	//$user[id] //=> 100003820940245
    //$user[name] //=> Evan d'Entremont
	
	
	
	

	echo "Already Logged In";
}
 }?>


<?php include('footer.php'); ?>
