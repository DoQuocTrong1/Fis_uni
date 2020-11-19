<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infomation</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/infomation.css"/>
</head>
<body>
<?php 
    require 'header.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "trongdq3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users ";
$sql1 = "SELECT * FROM users where username = '".$_SESSION['username']."'  ";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

if ($result->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {
    if($row1['level'] == '1') {
    echo "<table><tr><th>ID</th><th>UserName</th><th>Password</th><th>Name</th><th>Email</th><th>Level</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>". "" ."</td></tr>";
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        if($row['level'] ==0){
            echo "<td>Thành viên</td>";
        }else{
            echo "<td>Admin</td>";
        }
        echo "<td><a href='lib/delete.php?id=".$row['id']."'><input type='button' value='Delete'/></a>
        <a href='edit.php?id=".$row['id']."'><input type='button' value='Edit'/></a></td>";
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "<table><tr><th>ID</th><th>UserName</th><th>Password</th><th>Name</th><th>Email</th><th>Level</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>". "" ."</td></tr>";
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        if($row['level'] ==0){
            echo "<td>Thành viên</td>";
        }else{
            echo "<td>Admin</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
}
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>