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
			include('../inc/function.php');
				if($_SERVER['REQUEST_METHOD']=='POST')
				{   
					$errors=array();
					if(empty($_POST['tieude']))
					{
						$errors[]='tieude';
					}
					else{
						$title=$_POST['tieude'];
					}	
					if(empty($_POST['iddm']))
					{
						$errors[]='iddm';
					}
					else{
						$title=$_POST['iddm'];
					}			
					if(empty($_POST['tomtat']))
					{
						$errors[]='tomtat';
					}
					else{
						$tomtat=$_POST['tomtat'];
					}					
					if(empty($_POST['noidung']))
					{
						$errors[]='noidung';
					}
					else{
						$noidung=$_POST['noidung'];
					}					
					if(empty($_POST['anh']))
					{
						$errors[]='anh';
					}
					else{
						$anh=$_POST['anh'];
					}
					if(empty($_POST['ordernum']))
					{
						$errors[]='ordernum';
					}
					else{
						$ordernum=$_POST['ordernum'];
					}
					$status=$_POST['status'];
					
                    if(empty($_POST['ngaydang']))
					{
						$errors[]='ngaydang';
					}
					else{
						$ngaydang=$_POST['ngaydang'];
					}
					if (empty($errors)) 
					{
						$query ="INSERT INTO tblbaiviet(id_dm,tieude,tomtat,noidung,anh,ngaydang,ordernum,status) VALUES({$iddm},'{$title}','{$tomtat}','{$noidung}','{$anh}','{$ngaydang}',$ordernum,$status)";
						$results=mysqli_query($dbc,$query);
						if(mysqli_affected_rows($dbc)==1)
						{
							echo "<p style='color:green;'--> THêm mới thành công<p></p>";
						}
						else
						{
							echo "<p class='required'> thêm mới không thành công</p>";
					    }
					    $_POST['tieude']='';
					    $_POST['tomtat']='';
					    $_POST['noidung']='';
					    $_POST['anh']='';
					    $_POST['thutu']='';
					    $_POST['ngaydang']='';
				    }
				else{
					$message="<p class='required'> Bạn hãy nhập đây đủ thông tin</p>";
				}
			}
    ?>
		
			<form name="fradd_baiviet" method="POST" enctype="multipart/form-data">
				<?php
				  if(isset($message))
				  {
				  	echo $message;
				  }
				?>
			<h3>Thêm mới Bài viết </h3>

			<div class="form-group">
				<label>ID danh mục bài viết</label>
				<input type="text" name="iddm" value="<?php if(isset($_POST['iddm'])){echo $_POST['iddm'];}?>" class="form-control" placeholder="ID danh mục">
				<?php
					if(isset($errors)&& in_array('tieude',$errors ))
					{
						echo " <p class='required' >Bạn chưa nhập id danh mục</p>";
					}
				?>
			</div>
			
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="tieude" value="<?php if(isset($_POST['tieude'])){echo $_POST['tieude'];} ?>" class="form-control" placeholder="Title">
				<?php
					if(isset($errors)&& in_array('tieude',$errors ))
					{
						echo " <p class='required' >Bạn chưa nhập tiêu đề</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label style="display: block;">Tóm Tăt</label>
				<textarea name="tomtat" style="width: 100%;height: 150px; " ></textarea>
			</div>
			<div class="form-group">
				<label style="display: block;">Nội dung</label>
				<textarea name="noidung" style="width: 100%;height: 150px; "></textarea>
			</div>
			<div class="form-group">
				<label>Ảnh đại diện</label>
				<input type="text" name="anh" value="<?php if(isset($_POST['anh'])){echo $_POST['anh'];} ?>" class="form-control" placeholder="link ảnh">
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if(isset($_POST['ordernum'])){echo $_POST['ordernum'];} ?>" class="form-control" placeholder="Thứ tự">
			</div>
			<div class="form-group">
				<label>Ngày đăng</label>
				<input type="text" name="date">
			</div>
			<div class="form-group">
				<label style="display: block;">Trạng thái</label>
				<label class="radio-inline"></label>
				<input type="radio" name="status" value="1" checked="checked">Hiện Thị
				<label class="radio-inline"></label>
				<input type="radio" name="status" value="0"> Không hiện Thị
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('include/footer.php'); ?>
