<?php 
 include('../inc/connect.php');
 include('../inc/function.php');
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT, array('min_range' =>1 )))
{
  $id=$_GET['id_dm'];
  $query="DELETE FROM tbldanhmucbaiviet WHERE id={$id}";
  $result=mysqli_query($dbc,$query);
  kt($result,$query);
  header('Location: list_danhmuc.php');
}
else{
	header('Location: list_danhmuc.php');
}
?>