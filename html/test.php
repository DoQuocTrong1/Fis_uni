<html>
   
   <head>
      <title>Toán tử tam phân trong PHP</title>
   </head>
   <body>
   
       <?php
            function toan_tu_tam_phan($n){  
			$r = $n > 20 
			? "lớn hơn 20"  
			: ($n > 15  
			? "lớn hơn 15"  
			: ($n >10  
			? "lớn hơn 10"  
			: "Số vừa nhập là nhỏ hơn 10!"));   
			echo $n." : ".$r."<br>";  
			}  
			toan_tu_tam_phan(42);  
			toan_tu_tam_phan(21);  
			toan_tu_tam_phan(12);  
			toan_tu_tam_phan(50);
       ?>
         <?php
         // Hàm getenv() được dùng để lấy giá trị của các biến môi trường 
		 $rd = getenv('DOCUMENT_ROOT');  
		 echo $rd."<br>";
       ?>
       <?php
         echo php_uname()."<br>";  
			echo PHP_OS."<br>";  
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {  
			  echo 'Server đang sử dụng Windows!'."<br>";  
			} else {  
			  echo 'Đây không phải là Server đang sử dụng Windows!'."<br>";  
			}  
       ?>
       <?php
         echo "Last modified: " . date ("F d Y H:i:s.", getlastmod())."<br>";
       ?>
 
      
       <?php
        $mang_so_nguyen = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73,  
		68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73";  
		$mang_tam = explode(',', $mang_so_nguyen);  
		$tong_gia_tri = 0;  
		$do_dai_mang = count($mang_tam);  
		foreach($mang_tam as $gia_tri)  
		{  
		  $tong_gia_tri += $gia_tri;  
		}  
		$gia_tri_trung_binh = $tong_gia_tri/$do_dai_mang;  
		echo "Giá trị trung bình: ".$gia_tri_trung_binh."";   
        sort($mang_tam);  
		echo "<br>Liệt kê 5 số nguyên nhỏ nhất: ";  
		for ($i=0; $i < 5; $i++)  
		{   
		  echo $mang_tam[$i].", ";  
		}  
		echo "<br>Liệt kê 5 số nguyên lớn nhất: ";  
		for ($i=($do_dai_mang-5); $i < ($do_dai_mang); $i++)  
		{  
		  echo $mang_tam[$i].", ";  
        }
        echo "<br>";
       ?>
       <?php
        function ham_chuyen_doi_kieu($input, $ucase)  
		{  
		  $case = $ucase;  
		  $narray = array();  
		  if (!is_array($input))  
		  {  
		    return $narray;  
		  }  
		  foreach ($input as $key => $value)  
		  {  
		    if (is_array($value))  
		      {  
		        $narray[$key] = ham_chuyen_doi_kieu($value, $case);  
		        continue;  
		      }  
		    $narray[$key] = ($case == CASE_UPPER ? strtoupper($value) : strtolower($value));  
		  }  
		  return $narray;  
		}  
		$mang_ban_dau = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');  
		echo 'Mảng ban đầu: <br>';  
		print_r($mang_ban_dau);  
		echo '<br>Các giá trị ở dạng chữ thường.<br>';  
		$mang_dang_chu_thuong = ham_chuyen_doi_kieu($mang_ban_dau,CASE_LOWER);  
		print_r($mang_dang_chu_thuong);  
		echo '<br>Các giá trị ở dạng chữ hoa.<br>';  
		$mang_dang_chu_hoa = ham_chuyen_doi_kieu($mang_ban_dau,CASE_UPPER);  
		print_r($mang_dang_chu_hoa);
       ?>
       
   </body>
</html>