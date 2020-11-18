<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
		require_once("lib/connection.php");
		if (isset($_POST["btn_submit"])) {
			  //lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			 $name = $_POST["name"];
			  $email = $_POST["email"];
			  $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);
					$sql2 = "select * from users where email='$email'";
					$kt2 = mysqli_query($conn, $sql2);
					if(mysqli_num_rows($kt)  > 0){
						echo "<script>
								alert(\"Tài khoản đã tồn tại\");
								</script>";
					}elseif(mysqli_num_rows($kt2) > 0){
						echo "<script>
								alert(\"email da ton tai\");
								</script>";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    email,
							level
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email',
							'$level'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
                           echo "chúc mừng bạn đã đăng ký thành công";
						   header('Location: login.php');
						   if (mysqli_query($conn, $sql)){
							echo '<script language="javascript">alert("Đăng ký thành công"); window.location="register.php";</script>';
						}
						else {
							echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
						}
					}
			  }
	}
	?>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="username" placeholder="Username" required="">
					<input class="text email" type="password" name="pass" placeholder="Password" required="">
					<input class="text" type="text" name="name" placeholder="Họ tên" required="">
					<input class="text w3lpass" type="email" name="email" placeholder="Email" required="">
					<tr>
                    <td class="text-light">Level</td>
                    <td>
                        <select name="level">
                            <option value="0">Thành Viên</option>
                            <option value="1">Admin</option>
                        </select>
                    </td>
                </tr>
					<input type="submit" name="btn_submit" value="SIGNUP">
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
	<!-- //main -->
</body>
</body>
</html>