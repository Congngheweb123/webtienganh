<?php 
//hàm báo lỗi nếu kết nối không được 
function kt($result,$query){
	global $dbc;
	if(!$result)
	{
		die ("Query {$query}\n <br/> Mysqlerr:".mysqli_error($dbc));
	}
}
?>