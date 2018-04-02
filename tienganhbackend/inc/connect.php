<?php  
//ket noi csdl
$dbc=mysqli_connect('localhost','root','','webtienganh');
//kiem tra xem ket noi duoc khong
if(!$dbc){
	echo "kết nối không thành công ";
}
else{
	mysqli_set_charset($dbc,'utf8');
}
?>