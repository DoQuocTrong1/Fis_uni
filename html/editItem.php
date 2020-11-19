<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "trongdq3";
$id=$_REQUEST['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM items where id = '".$id."'  ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$image = $row['image'];
$image_src = "uploads/".$image;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
<?php 
    require 'header.php';
?>
<?php
if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $itemname = $_POST["itemname"];
    $itemprice = $_POST["itemprice"];
    $id=$_REQUEST['id'];
    $sql = "UPDATE  items SET name='".$itemname."', image='".$row['image']."', price='".$itemprice."' WHERE id = '".$id."' ";
    mysqli_query($conn,$sql);
    header('Location: dashboard.php'); 
}
mysqli_close($conn);
?>
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top justify-content-center">
                <img src="<?php echo $image_src ?>"  width="400" height="250" ></img>
				<form action="" method="post" name="form" class="m-2">
					<p><input class="text" type="text" name="itemname" placeholder="Name" required value="<?php echo $row['name'];?>"></p>
					<input class="text email" type="text" name="itemprice" placeholder="Price" required value="<?php echo $row['price'];?>"> 
					<input type="submit" name="btn_submit" value="EDIT">
				</form>
			</div>
        </div>
	</div>
</body>
</html>