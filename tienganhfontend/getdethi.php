<?php 

    //B1-Ket noi DB và kiểm tra kết nối
    include("inc/connect.php ");
    echo '<?xml version="1.0" encoding="UTF-8"?>';
   
	//kiểm tra số câu đúng câu sai
    if(isset($_POST['result'])){
        $arr=$_POST;
        $true= 0;
    	  $false =0;
        foreach ($arr as $key => $value) {
          if (is_numeric($key)){
            $sql2="SELECT id,da FROM tblcauhoi";
            $resul2 =mysqli_query($dbc,$sql2);
            $row2=mysqli_fetch_array($resul2, MYSQLI_ASSOC);
           if($value==$row2['da']){
               $true++;
           }
           else{
               $false++;
           }
         }
        } 
    	echo "Bạn đã làm đúng:{$true} câu và sai :{$false} câu.";
    }
 ?>
 <form method="post" action="getdethi.php ">
 <?php 
//Thuc hien Truy van lấy dữ liệu của đề thi 

    $sql1="SELECT * from tblcauhoi where id_dm=5";
	$result1=mysqli_query($dbc,$sql1);
	While ($row=mysqli_fetch_assoc($result1)) {
	 		echo $row['cauhoi'].'<br>';
		?>  
          <input type="radio" name="<?php echo $row['id']?>" value="A" ><?php echo $row['A'].'<br>';?>
          <input type="radio" name="<?php echo $row['id']?>" value="B" ><?php echo $row['B'].'<br>' ?>
          <input type="radio" name="<?php echo $row['id']?>" value="C" ><?php echo $row['C'].'<br>' ?>
          <input type="radio" name="<?php echo $row['id']?>" value="D" ><?php echo $row['D'].'<br>' ?>
    <?php  }
    ?>
          <input type="submit" name="result" value="Kết quả">
</form>
