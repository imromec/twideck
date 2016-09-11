<?php

//including global file
include 'includes/global.php';

if(isset($_SESSION['status']) && $_SESSION['status'] == 'verified') 
{
	print_r($_SESSION);
}
else
{
	header('Location: /login/');
}

//Retrive variables
$screen_name 		= $_SESSION['request_vars']['screen_name'];
$twitter_id			= $_SESSION['request_vars']['user_id'];
$oauth_token 		= $_SESSION['request_vars']['oauth_token'];
$oauth_token_secret = $_SESSION['request_vars']['oauth_token_secret'];
	
		//Show welcome message
		echo '<div class="welcome_txt">Welcome <strong>'.$screen_name.'</strong> (Twitter ID : '.$twitter_id.'). <a href="logout/?logout">Logout</a>!</div>';

