<?php

require_once 'classes/db_class.php';
require_once 'classes/user_class.php';
require_once 'classes/activity_class.php';
 
//connect to the database
$db = new DatabaseConnection();
$db->connect();
 
//user activity object
$userTools = new UserActivity();
 
//start the session
session_start();
 
//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
    $user = $_SESSION['user_record'];
    print_r($user);
    $_SESSION['user_record'] = $userTools->get($user->twitter_id);
}