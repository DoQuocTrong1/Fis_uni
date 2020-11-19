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
$sql = "SELECT * FROM users where id = '".$id."'  ";
$result = $conn->query($sql);
$row = $result->fetch_assoc()
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
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $id=$_REQUEST['id'];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username == "" || $password == "" || $name == "" || $email == "") {
         echo "bạn vui lòng nhập đầy đủ thông tin";
    }else{
        $sql = "UPDATE  users SET username='".$username."', password='".$password."', name='".$name."', email='".$email."' WHERE id = '".$id."' ";
            
            mysqli_query($conn,$sql);
            echo "chúc mừng bạn đã đăng ký thành công";
            header('Location: infomation.php');
          
                              
          
    }
}
mysqli_close($conn);
?>
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="post" name="form">
					<p><input class="text" type="text" name="username" placeholder="Username" required value="<?php echo $row['username'];?>"></p>
					<input class="text email" type="password" name="pass" placeholder="Password" required value="<?php echo $row['password'];?>"> 
					<input class="text" type="text" name="name" placeholder="Họ tên" required value="<?php echo $row['name'];?>">
					<input class="text w3lpass" type="email" name="email" placeholder="Email" required value="<?php echo $row['email'];?>">
					<input type="submit" name="btn_submit" value="EDIT">
				</form>
			</div>
        </div>

		<!-- copyright -->
	
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</body>
</html>