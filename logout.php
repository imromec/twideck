<?php

require_once 'includes/global.php';
 
$userActivity = new UserActivity();
$userActivity->logout();
 
header("Location: /twideck/");