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
			<ul class="tin">
			<?php 
				include('getbaiviethome.php');
			?>
			</ul>
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
