<?php

require_once 'db_class.php';
require_once 'user_class.php';

class UserActivity {

	//login function
	public function login($twitter_id)
	{
		$db = new DatabaseConnection();

		$userRecord = $db->selectRecord('users', 'twitter_id = '.$twitter_id);
		
		print_r($userRecord);
 
        if(!empty($userRecord))
        {
            $_SESSION["user_record"] = serialize($userRecord);
            $_SESSION["login_time"] = time();
            $_SESSION["logged_in"] = 1;
            
            return true;
        }
        else
        {
            return false;
        }
	}

	//destroy the session
    public function logout() {
        unset($_SESSION['user_record']);
        unset($_SESSION['login_time']);
        unset($_SESSION['logged_in']);
        session_destroy();
    }
    
    //get a user details.....will take twitter_id
    public function get($twitter_id)
    {
        $db = new DatabaseConnection();

        $result = $db->selectRecord('users', "twitter_id = $twitter_id");
        
        return new User($result);
    }
}