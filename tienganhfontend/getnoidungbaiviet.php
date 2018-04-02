<!DOCTYPE html>
<html>
<head>
	<title> Tiếng anh online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/script2.js" ></script>
	<script src="js/script.js" ></script>
</head>
<body>
	<!--menu,và logo-->
	<div id="header">
		<img src="images/logo.png">
	</div>
	<div id="menu">
		<ul >
			<li><a href="">Trang chủ</a></li>
			<?php 
				include('getmenu.php');
			?>
		</ul>
		<!-- kết thúc menu,và logo-->
	</div>
	 <div id="content">
		<div id="left">
<?php 

    //B1-Ket noi DB và kiểm tra kết nối
	
    include("inc/connect.php ");
    echo '<?xml version="1.0" encoding="UTF-8"?>';
   	//B2-Thuc hien Truy van lấy dữ liệu bài viết
	$id=$_GET['id'];
	settype($id, "int");
	$sqlnd="SELECT * FROM tblbaiviet WHERE id=$id";
	$resultnd=mysqli_query($dbc,$sqlnd);
	While ($row = mysqli_fetch_array($resultnd , MYSQLI_ASSOC)){
		?>
				<h1><?php echo $row['tieude'] ?></h1>
				<img style="width: 500px;height: 250px;" src="images/<?php echo $row['anh'] ?>">
				<p><?php echo $row['noidung'] ?></p>
		<?php  }
			mysqli_close($dbc);
?>

		</div>
		<div id="right">
			<h3>Video hot</h3>
			<iframe width="200" height="120" class="embed-player" src="https://www.youtube.com/embed/" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	       	<?php 
				include('getvideo.php');
			?>
	        <br >
	        </ul>
			<h3>Bài viết mới </h3>
			<ul id="bvmoi">
            <?php 
                include('getbaivietmoinhat.php');
            ?>
			</ul>
	    </div>
	</div>
	<div id="footer">
		<p>hoctienganh</p><br>
	</div>		
</body>
</html>
   