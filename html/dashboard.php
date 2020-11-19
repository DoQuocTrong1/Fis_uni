<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
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
$sql = "SELECT * FROM items ";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Image</th><th>Price</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $image = $row['image'];
        $image_src = "uploads/".$image;
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td><img src='".$image_src."'width=80 height=80 > </td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td><a href='lib/deleteItem.php?id=".$row['id']."'><input type='button' value='Delete'/></a>
        <a href='editItem.php?id=".$row['id']."'><input type='button' value='Edit'/></a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>