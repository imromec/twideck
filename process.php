<?php

require 'includes/global.php';

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

if(isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token']  !== $_REQUEST['oauth_token'])
{
	session_destroy();
	
	header('Location: login/');	
}
else if(isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] == $_REQUEST['oauth_token'])
{
	$oauth_verifier = $_REQUEST['oauth_verifier'];

	$userActivity = new UserActivity();

	$userActivity->loggedInUserDetail($oauth_verifier);

}
else
{
	$userActivity = new UserActivity();

	$userActivity->login();
}
?>

