<?php ob_start(); ?>
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
			//Kiểm tra có là kiểu số không
			if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT, array('min_range' =>1 )))
			{
		          $id=$_GET['id'];
		    }
		    else{
		    	header('Location: list_video.php');
		    	exit();
		    }
			if($_SERVER['REQUEST_METHOD']=='POST')
			{   
				$errors=array();
				if(empty($_POST['title']))
				{
					$errors[]='title';
				}
				else{
					$title=$_POST['title'];
				}
				if(empty($_POST['link']))
				{
					$errors[]='link';
				}
				else{
					$link=$_POST['link'];
				}
				if(empty($_POST['ordernum']))
				{
					$errors[]='ordernum';
				}
				else{
					$ordernum=$_POST['ordernum'];
				}
				if(empty($_POST['status']))
				{
					$errors[]='status';
				}
				else{
					$status=$_POST['status'];
				}
				if (empty($errors)) 
				{
		
					$query ="UPDATE tblvideo
					SET title='{$title}',
						link='{$link}',
						ordernum={$ordernum},
						status={$status}
					WHERE id={$id};";
					$results=mysqli_query($dbc,$query) or die("query {$query} \n <br/> Mysqlerr:".mysqli_error($dbc));
					if(mysqli_affected_rows($dbc)==1)
					{
						echo "<p style='color:green;'> Sửa thành công</p>";
					}
					else
					{
							echo "<p class= 'required'> Sửa không thành công</p>";
					}
					$_POST['title']='';
					$_POST['link']='';
					$_POST['ordernum']='';
					$_POST['status']='';
				}
				else{
					$message="<p class='required'> Bạn hãy nhập đây đủ thông tin</p>";
				}
			}
		?>
		
			<form name="fradd_video" method="POST">
				<?php
				  if(isset($message))
				  {
				  	echo $message;
				  }
				?>
			<h3>Sửa video</h3>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" value="<?php if(isset($title)){echo $title;} ?>" class="form-control" placeholder="Title" >
				<?php
					if(isset($errors)&& in_array('title',$errors ))
					{
						echo " <p class='requierd' >Bạn chưa nhập tiêu đề</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" value="<?php if(isset($link)){echo $link;} ?>" class="form-control" placeholder="Link" >
				<?php
					if(isset($errors)&& in_array('link',$errors ))
					{
						echo " <p class='required'> Bạn chưa nhập link video</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if(isset($ordernum)){echo $ordernum;} ?>" class="form-control" placeholder="Thứ tự" >
			</div>
			<div class="form-group">
				<label style="display: block;">Trạng thái</label>
				<?php 
					if(isset($status)==1)
					{
					?>
					<label class="radio-inline"></label>
					<input type="radio" name="status" value="1" checked="checked" >Hiện Thị</label>
					<label class="radio-inline"></label>
					<input type="radio" name="status" value="0" > Không hiện Thị</label>
					<?php
					}
					else
					{
?>
					<label class="radio-inline"></label>
					<input type="radio" name="status" value="1" checked="checked" >Hiện Thị</label>
					<label class="radio-inline"></label>
					<input type="radio" name="status" checked="checked" value="0" > Không hiện Thị</label>
					<?php
					}
				?>
				
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		</form>
	</div>
</div>
<?php include('include/footer.php'); ?>
<?php ob_flush(); ?>
