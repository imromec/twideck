<?php

//including global file
include 'includes/global.php';


if(isset($_SESSION['logged_in']))
	echo 'You are logged in';
else
	header("Location: login/");

print_r($_SESSION);

