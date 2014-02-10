<?php
/**
 * PHP 5.3 php file to use the OAuthApi class
 * Add issue in specific repository based on repository url.
 * @author Abhinav Saxena <abhi1704@gmail.com>
 * @version   $Id: repoapi V0.01
 * @created   2014-02-09 20:00:00
 */

//Github Command Line Command: php create_issue.php username password "https://github.com/example/test" "Issue title" "Issue Description"

//Bitbucket Command Line Command: php create_issue.php username password "https://bitbucket.org/example/test" "Issue title" "Issue Description"

//disable error messages
ini_set('display_errors', 0);

//verify should be only access by command line
if (PHP_SAPI !== 'cli') {
    die( 'This file can be only run by command line' );
}

//check register_argc_argv is enable
if(count($argv) == 0) {
    die( 'Enable register_argc_argv in php.ini' );
}

//include OAuthApi class to Handles github and bitbucket Api specific request
require_once('lib/OAuthApi.php');

// assign passed arguments into variables
list($filename, $username, $password, $repository_url, $title, $desc) = $argv;

if( validateInput($username, $password, $repository_url, $title) ) {
    //create object of OAuthApi
    $oauthApi = new OAuthApi($repository_url, $username, $password);

    //Send request to create repository issue on github|bitbucket
    $response = $oauthApi->post(array('title' => $title, 'desc' => $desc));

    //show message based on return response from Api's
    if(is_object($response) && isset($response->title)) {
        echo PHP_EOL .'Repository issue posted successfully'. PHP_EOL;
    } else {    
        echo PHP_EOL .'Repository issue not posted successfully'. PHP_EOL;
    }
}

//Validate user inputs
function validateInput($username = null, $password = null, $repository_url = null, $title = null) {
    if($username == "") {
        echo PHP_EOL .'Username Required'. PHP_EOL;
        return false;
    } else if($password == "") {
        echo PHP_EOL .'Password Required'. PHP_EOL;
        return false;
    } else if($repository_url == "") {
        echo PHP_EOL .'Repository url Required'. PHP_EOL;
        return false;
    } else if($title == "") {
        echo PHP_EOL .'Title Required'. PHP_EOL;
        return false;
    }
    return true;
}

//print string for debugging
function pr($str=NULL) {
	echo '<pre>';
		print_r($str);
	echo '<pre>';
}