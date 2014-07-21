<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "2492006305-LrUx0QVVFLDuu6Lw713Nw0CJbdoDeLrlnxCc7op",
    'oauth_access_token_secret' => "6DuZTIvmomEPeQTgtTqhvgklIPcwSFtWIgWME6tyt1G8R",
    'consumer_key' => "MPWgJVaC9SoWPi4HGeNXy04k7",
    'consumer_secret' => "tdBeFnaj9InEGSZiXLF0LQGu7SewX7ofUF3PKYqyMKSMz1kRYN"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ 
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above 
$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);

/** Perform a POST request and echo the response 
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=StephenAtHome&count=3';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();




