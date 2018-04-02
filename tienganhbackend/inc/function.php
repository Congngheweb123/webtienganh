<?php 
//kiểm tra hàm có đúng hay không
function kt($result,$query){
	global $dbc;
	if(!$result)
	{
		die ("Query {$query}\n <br/> Mysqlerr:".mysqli_error($dbc));
	}
}
//hàm danh mục dệ quy
function show($cha_id="0",$insert_text="")
{
	global $dbc;
	$query_dq="SELECT * FROM tbldanhmucbaiviet WHERE cha_id=".$cha_id." ORDER BY cha_id DESC ";
   $theloai=mysqli_query($dbc,$query_dq);
   While($theloai=mysqli_fetch_array($theloai,MYSQLI_ASSOC))
   {
   	echo ("<option value='".$theloai["id"]."'>".$insert_text.$theloai['danhmucbaiviet']."</option>");
   		show($theloai["id"],$insert_text.">>");
   }
   return true;
}
function luachon($name,$class)
{
	global $dbc;
	echo "<select name='".$name."' class'".$class."'>";
	echo "<option value='0'> Danh muc cha</option>";
	show();
	echo "</select>";
}
?>