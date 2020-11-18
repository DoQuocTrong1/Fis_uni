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
    <title>Upload</title>
    <link rel="stylesheet" href="css/register.css"/>

</head>
<body>
<?php 
    require 'header.php';
?>
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <p><input  type="text" name="item_price" placeholder="Tên sản phẩm"  ></p>
					<p><input class="number" type="text" name="item_price" placeholder="Giá sản phẩm"  ></p>
                        <text style="color: #ffffff">Select image to upload:</text>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
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

<form action="upload.php" method="post" enctype="multipart/form-data">
</form>

</body>
</html>