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

/** Eric Buck + Kenny Adeogun - This pulls down the 3 most recent tweets from Stephen Colbert  
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=StephenAtHome&count=3';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(); **/


/** Christian Santarelli + Zach Albert - This searches for all tweets with #selfie **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=#selfie';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

var_dump(json_decode($response)); 



