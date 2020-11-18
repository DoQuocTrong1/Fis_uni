<?php
$server_username = "root";
$server_password = "vertrigo";
$server_host = "localhost";
$database = 'trongdq3';

// Create connection
$conn = mysqli_connect($server_host, $server_username, $server_password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql1 = "CREATE TABLE IF NOT EXISTS `items` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `image` varchar(30) NOT NULL,
    `price` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

if (mysqli_query($conn, $sql1)) {
//    echo "dara";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");