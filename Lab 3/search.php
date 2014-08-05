<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

$search = $_POST['search'];

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "2492006305-LrUx0QVVFLDuu6Lw713Nw0CJbdoDeLrlnxCc7op",
    'oauth_access_token_secret' => "6DuZTIvmomEPeQTgtTqhvgklIPcwSFtWIgWME6tyt1G8R",
    'consumer_key' => "MPWgJVaC9SoWPi4HGeNXy04k7",
    'consumer_secret' => "tdBeFnaj9InEGSZiXLF0LQGu7SewX7ofUF3PKYqyMKSMz1kRYN"
);
/** This code is from the previous lab **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=' . $search;
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
/** creates an associative array called tweets **/
$tweets = json_decode($response,true);

/** This code isn't needed but we wanted to keep it in this file for future 
 reference - proper syntax for pulling out individual values from array 
 created above. **/
 //$tweet1 = $tweets['statuses'][0]['text'];
//$date1 = $tweets['statuses'][0]['created_at'];
//$tweetid1 = $tweets['statuses'][0]['id_str'];

$db = new mysqli('localhost','root','root','tweettodb');

/** This foreach loop iterates through each tweet, then inserts the date,
ID string, and actual tweet itself into our SQL DB **/
 foreach ($tweets['statuses'] as $tweet) {
    $x = $tweet['text'];
    $y = $tweet['created_at'];
    $z = $tweet['id_str'];
    $query = "INSERT INTO tweets (date, tweet, tweetid) VALUES ('$y', '$x', '$z')";
    $db->query($query);
} 

echo "Check the DB for the following tweets!";

var_dump(json_decode($response)); 




