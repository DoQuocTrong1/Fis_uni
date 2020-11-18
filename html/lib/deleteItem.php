<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "trongdq3";
$id = $_GET['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM items WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../dashboard.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>