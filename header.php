<?php
//including global file
include 'includes/global.php';

if(isset($_SESSION['status']) && $_SESSION['status'] == 'verified') 
{
	$Twitter = new TwitterClass();
}
else
{
	header('Location: login/');
}

//userDetails
$userProfileImage = $Twitter->getUserProfileKeyValue('profile_image_url');
$userProfileImage = str_replace('_normal', '_bigger', $userProfileImage);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>twideck - Simplify Your Twitter Experience</title>

	<link rel="icon" href="/img/favicon.png" type="image/png">
	<!-- Latest compiled and minified bootstrap framework -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
	<nav class="welcome-twideck">
	</h3>Welcome to twiDeck <?php echo $Twitter->getUserProfileKeyValue('screen_name'); ?></h4>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 header">
			<div style="user-profile">
				<img src="<?php echo $userProfileImage; ?>" class="img-circle">
				<h4><strong class="name"><?php echo $Twitter->getUserProfileKeyValue('name'); ?></strong> &nbsp; <span style="screen-name">@<?php echo $Twitter->getUserProfileKeyValue('screen_name'); ?></span></h4>
				<p class="description"><?php echo $Twitter->getUserProfileKeyValue('description'); ?></p>
				<p class="logout-twitter">
					<a href="https://twitter.com/<?php echo $Twitter->getUserProfileKeyValue('screen_name'); ?>"><i class="fa fa-twitter-square"></i></a>
					&nbsp;&nbsp; | &nbsp;&nbsp; 
					<a href="/logout/?logout"><i class="fa fa-sign-out"></i></a>
				</p>
			</div>
		</div>
	</div>
</div>
<hr style="clear:both;">

