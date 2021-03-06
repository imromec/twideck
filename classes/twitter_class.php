<?php

require_once 'activity_class.php';

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterClass{

	public $myAccessToken = '*****';
	public $myAccessTokenSecret = '******';
		
	public function getSearchAPIResults($searchKey, $since_id = null, $max_id = null)
	{	
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $this->myAccessToken, $this->myAccessTokenSecret);

		$results = $connection->get("search/tweets", ["q" => $searchKey, "since_id" => $since_id, "max_id" => $max_id, "count" => 350]);

		return $results;
	}	

	public function getUserProfileKeyValue($key)
	{
		return $_SESSION['user_details']->$key;
	}
}
