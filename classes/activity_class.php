<?php

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

class UserActivity {

	//login function
	public function login()
	{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
        $request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => OAUTH_CALLBACK));

        if($request_token)
        {
            $oauth_token = $request_token['oauth_token'];
            $oauth_token_secret = $request_token['oauth_token_secret'];
            $oauth_result = $request_token['oauth_callback_confirmed'];

            $_SESSION['oauth_token'] = $oauth_token ;
            $_SESSION['oauth_token_secret'] = $oauth_token_secret;

            //GETTING THE URL FOR ASKING TWITTER TO AUTHORIZE THE APP WITH THE OAUTH TOKEN
            $url = $connection->url("oauth/authorize", array("oauth_token" => $oauth_token));

            if($oauth_result)
            {
                header('Location: ' . $url); 
            }
            else
            {
                $response = "Coonection with twitter is failed, please check.";
            }
         
        }
        else 
        {
            $response =  "Error Receiving Request Token";
        }

        return $response;
	}

    //function to revoke user details after fresh login
    public function loggedInUserDetail($oauth_verifier)
    {
        //Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'] , $_SESSION['oauth_token_secret']);
        
        $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $oauth_verifier));

        $accessToken = $access_token['oauth_token'];
        $accessTokenSecret = $access_token['oauth_token_secret'];

        if(isset($oauth_verifier) && $oauth_verifier != '')
        {
            //Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
            $publicConnection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $accessToken , $accessTokenSecret);
            
            //get user details
            $user_details = $publicConnection->get('account/verify_credentials', ['include_email' => 'true']);
            //set session
            $_SESSION['status'] = 'verified';
            $_SESSION['request_vars'] = $access_token;
            $_SESSION['user_details'] = $user_details;

            //Unset no longer needed request tokens
            unset($_SESSION['oauth_token']);
            unset($_SESSION['oauth_token_secret']);

            header('Location: /');
        }
        else
        {
            die("Sorry! We are facing problem with communicating to twitter please try again later.");
        }

        return true;
    }

	//destroy the session
    public function logout()
    {
        if(array_key_exists('logout',$_GET))
        {
            session_destroy();
            header("Location: /login/");
        }
    }
}