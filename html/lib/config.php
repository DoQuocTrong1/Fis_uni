<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "vertrigo"; /* Password */
$dbname = "trongdq3"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>