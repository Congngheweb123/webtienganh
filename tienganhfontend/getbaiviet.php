
<?php 

    //B1-Ket noi DB và kiểm tra kết nối
	
    include("inc/connect.php ");
    echo '<?xml version="1.0" encoding="UTF-8"?>';
	//B2-Thuc hien Truy van
	$id=$_GET['id'];
	settype($id, "int");
	$sql="SELECT * FROM tblbaiviet WHERE id_dm=$id";
	$result=mysqli_query($dbc,$sql);
	While ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
	{
?>  
		<li value="<?php echo $row['id']?>">
			<img src="images/<?php echo $row['anh'] ?>">
			<h2><a href="getnoidungbaiviet.php?id=<?php echo $row['id']?>"><?php echo $row['tieude'] ?></a></h2>
			<?php echo $row['tomtat']?>
		</li>
<?php  }
		mysqli_close($dbc);
?>

