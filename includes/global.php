<?php
session_start();

define('CONSUMER_KEY', 'vcv0tvp673euCPav9a4ncdMnS');
define('CONSUMER_SECRET', 'gfObR3PbFuzFczhuMmf6o5vrMsonvnz6WyAFnghviXNP6CAzQq');
define('OAUTH_CALLBACK', 'https://twideck.herokuapp.com/process/');
//define('OAUTH_CALLBACK', 'http://127.0.0.1/twideck/process/');

require_once 'classes/activity_class.php';
require_once 'classes/twitter_class.php';
 