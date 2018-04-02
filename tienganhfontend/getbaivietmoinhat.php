
<?php 
    include("inc/connect.php ");
	$query_moi="SELECT * FROM tblbaiviet ORDER BY id DESC LIMIT 0,5";
	$result_moi=mysqli_query($dbc,$query_moi);
	while($row=mysqli_fetch_array($result_moi, MYSQLI_ASSOC))
		{?>
		<li><a href="getnoidungbaiviet.php?id=<?php echo $row['id']?>"><?php echo $row['tieude']; ?></a></li>
<?php 	}					
?> 