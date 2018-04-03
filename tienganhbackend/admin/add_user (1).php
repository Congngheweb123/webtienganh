<style type="text/css">
	.required{
		color: red;
	}
</style>
<?php include('include/header.php') ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<?php
			include('../inc/connect.php');
				if($_SERVER['REQUEST_METHOD']=='POST')
				{   
					$errors=array();
					if(empty($_POST['hoten']))
					{
						$errors[]='hoten';
					}
					else{
						$hoten=$_POST['hoten'];
					}
					if(empty($_POST['matkhau']))
					{
						$errors[]='matkhau';
					}
					else{
						$matkhau=md5(trim($_POST['matkhau']));
					}
					if(trim($_POST['matkhau']!=$_POST['matkhaure']))
					{
						$errors[]='matkhaure';
					}
					if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==TRUE)
					{
						$email=mysqli_real_escape_string($dbc,$_POST['email']);
					}
					else{
						$errors[]='email';
					}
					if (empty($errors)) 
					{
						$query2="SELECT email FROM tlbtaikhoan WHERE email='{$email}'";
						$result2=mysqli_query($dbc,$query2) ;
                        if (mysqli_num_rows($result2)==1)
						{	echo "<p class= 'required'> email đã tồn tại, yêu cầu nhập lại</p>";
						}
						else
						{
							$query3="INSERT INTO tlbtaikhoan(hoten,email,matkhau) VALUES('{$hoten}','{$email}','{$matkhau}')";
							$result3=mysqli_query($dbc,$query3);
							if(mysqli_affected_rows($dbc)==1)
						{
							echo "<p style='color:green;'> THêm mới thành công</p>";
						}
						else
						{
							echo "<p class= 'required'> thêm mới không thành công</p>";
					    }
						
						$_POST['taikhoan']='';
						$_POST['hoten']='';
						$_POST['email']='';
					}
				}
				else{
					$message="<p class='required'> Bạn hãy nhập đây đủ thông tin</p>";
				}
			}
		?>
		
			<form name="fradd_user" method="POST">
				<?php
				  if(isset($message))
				  {
				  	echo $message;
				  }
				?>
			<h3>Thêm mới Người dùng </h3>
			<div class="form-group">
				<label>họ tên</label>
				<input type="text" name="hoten" value="<?php if(isset($_POST['hoten'])){echo $_POST['hoten'];} ?>" class="form-control" placeholder="Họ tên" >
				<?php
					if(isset($errors)&& in_array('hoten',$errors ))
					{
						echo " <p class='required' >Bạn chưa nhập họ tên </p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Mật khẩu</label>
				<input type="password" name="matkhau" value="" class="form-control" placeholder="Mật khẩu " >
				<?php
					if(isset($errors)&& in_array('matkhau',$errors ))
					{
						echo " <p class='required'> Bạn chưa nhập mật khẩu </p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Xác nhập mật khẩu</label>
				<input type="password" name="matkhaure" value="" class="form-control" placeholder="Xác nhập mật khẩu" >
				<?php
					if(isset($errors)&& in_array('matkhaure',$errors ))
					{
						echo " <p class='required'>Mật khẩu không giống nhau </p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" class="form-control" placeholder="Email" >
				<?php
					if(isset($errors)&& in_array('email',$errors ))
					{
						echo " <p class='required' >Bạn chưa nhập đúng email</p>";
					}
				?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('include/footer.php'); ?>
