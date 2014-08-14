<?php
$db = new mysqli('localhost','root','root','tweettodb');

//looks for identical tweetid's
$query = "SELECT
    tweet, tweetid, COUNT(*)
FROM
    tweets
GROUP BY
    tweet, tweetid
HAVING 
    COUNT(*) > 1";

$result = mysqli_query($db, $query);

//creates a table and each row contains a tweet that was found more than once
//in the database
echo "<table>"; 

while($row = mysqli_fetch_array($result)){   
echo "<tr><td>" . $row['tweet'] . "</td><td>" . $row['tweetid'] . "</td></tr>"; 
}

echo "</table>"; 
  

