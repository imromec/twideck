<?php

/*require_once 'includes/global.php';
 
$twitter_id = "";

//login with twitter
if(isset($_REQUEST['submit-login'])) { 
 
    $twitter_id = $_REQUEST['twitter_id'];
 
    $userActivity = new UserActivity();

    if($userActivity->login($twitter_id))
    {
        header("Location: index.php");
    }
    else
    {
        echo "Sorry! Something went wrong";
    }
}*/
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>twideck - Simplify Your Twitter Experience</title>
    
    <!-- Latest compiled and minified bootstrap framework -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 center-manage">
           <h1 class="brand-logo"><b>twiDeck<b></h1>
           <h2 class="brand-tagline">Simplify Your Twitter Experience</h2><br>
           <a href="#" id="sign-in-with-twitter"><img src="/img/twitter-btn.png"></a>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>