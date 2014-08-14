<html>
    <a href='compare.php'>Compare the tweets from both searches</a>
    <br/><br/>
</html>
<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

$search1 = $_POST['search1'];
$search2 = $_POST['search2'];

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "2492006305-LrUx0QVVFLDuu6Lw713Nw0CJbdoDeLrlnxCc7op",
    'oauth_access_token_secret' => "6DuZTIvmomEPeQTgtTqhvgklIPcwSFtWIgWME6tyt1G8R",
    'consumer_key' => "MPWgJVaC9SoWPi4HGeNXy04k7",
    'consumer_secret' => "tdBeFnaj9InEGSZiXLF0LQGu7SewX7ofUF3PKYqyMKSMz1kRYN"
);
/** This code is from the previous lab **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=' . $search1;
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
/** creates an associative array called tweets **/
echo "Check the DB for the following tweets!";

$tweets1 = json_decode($response,true);
var_dump(json_decode($response)); 


$db = new mysqli('localhost','root','root','tweettodb');

/** This foreach loop iterates through each tweet, then inserts the date,
ID string, and actual tweet itself into our SQL DB **/
 foreach ($tweets1['statuses'] as $tweet) {
    $x = $tweet['text'];
    $y = $tweet['created_at'];
    $z = $tweet['id_str'];
    $query = "INSERT INTO tweets (date, tweet, tweetid) VALUES ('$y', '$x', '$z')";
    $db->query($query);
} 

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=' . $search2;
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
/** creates an associative array called tweets **/
$tweets2 = json_decode($response,true);


/** This foreach loop iterates through each tweet, then inserts the date,
ID string, and actual tweet itself into our SQL DB **/
 foreach ($tweets2['statuses'] as $tweet) {
    $x = $tweet['text'];
    $y = $tweet['created_at'];
    $z = $tweet['id_str'];
    $query = "INSERT INTO tweets (date, tweet, tweetid) VALUES ('$y', '$x', '$z')";
    $db->query($query);
} 

var_dump(json_decode($response)); 




