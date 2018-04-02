<?php 
	//B1-Ket noi DB và kiểm tra kết nối
include("inc/connect.php ");
	//B2-Thuc hien Truy van
    $sqldm="SELECT * FROM tbldanhmucbaiviet";
	$dmresult =mysqli_query($dbc,$sqldm);
    while($row=mysqli_fetch_array($dmresult , MYSQLI_ASSOC))
		{
			$hienthi='<li value="'.$row['id'].'"><a href="#">'.$row['danhmucbaiviet'].'</a></li>';
			echo $hienthi;
		}
		mysqli_close($dbc);
?>