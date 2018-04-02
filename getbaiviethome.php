<?php 
	 //B1-Ket noi DB và kiểm tra kết nối
    include("inc/connect.php ");
    //B2-Thuc hien Truy van lấy ra các tin ngẫu nhiên đổ ra trang chủ
	$sql="SELECT * FROM tblbaiviet ORDER BY rand() Limit 0,5";
	$result=mysqli_query($dbc,$sql);
	While ($row=mysqli_fetch_array($result , MYSQLI_ASSOC)){
		?>  
			<li value="<?php echo $row['id']?>" >
				<img src="images/<?php echo $row['anh'] ?>">
				<h2><a href="getnoidungbaiviet.php?id=<?php echo $row['id']?>"> <?php echo $row['tieude'] ?></a></h2>
				<?php echo $row['tomtat']?>
			</li>
		<?php  }
		mysqli_close($dbc);
?>
<!--index.php?p=getnoidungbaiviet&id=<?php //echo $row['id']?>-->