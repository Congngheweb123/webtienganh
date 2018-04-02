
<?php 
    include("inc/connect.php ");
    include("inc/function.php ");
    $query_video="SELECT * FROM tblvideo ORDER BY ordernum DESC";
    $result_video=mysqli_query($dbc,$query_video);
    kt($result_video,$query_video);
?>
<ul class="list-video">
<?php
	 while ( $video=mysqli_fetch_array($result_video, MYSQLI_ASSOC)) {
	 	$str=explode('=', $video['link']);

     ?>    	
    <li><a style="cursor: pointer;" title="<?php $str['1']; ?>" >&nbsp;<?php echo $video['title']; ?></a></li>
    <?php
	}
	mysqli_close($dbc);
?>